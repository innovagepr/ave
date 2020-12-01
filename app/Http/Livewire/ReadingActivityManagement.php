<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\Difficulty;
use App\Models\Group;
use App\Models\ListExercise;
use App\Models\User;
use App\Models\Word;
use App\Models\Paragraph;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Rules\IsDefault;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class ReadingActivityManagement extends Component
{

    use WithPagination;
    protected $rules = [
        'name' => 'required|max:128',
        'diffToEdit' => 'required'

    ];
    protected $messages = [
        'name.required' => 'Favor proveer un nombre.',
        'name.max' => 'El nombre de la lista no puede exceder 128 caracteres.',
    ];
    protected $listeners = [
        'listUpdate',
    ];
    public $tempDate;
    public $name;
    public $tableActive;
    public $difficulty= "Fácil";
    public $nameToEdit;
    public $diffToEdit;
    public $listToRemove;

    public $groups;
    public $listActive;
    public $groupList = [];
    public $studentList = [];
    public $students = [];
    public $selectedGroup;
    public $description;
    public $groupStudents = array();
    public $selectedGroupName;
    public $creationdate;
    public $members;
    public $email;
    public $activityType;
    public $studentID = 7;
    public $active = true;
    public $headersGroups = array("Nombre", "Dificultad", "Cantidad", "Asignada a", "Activa", "Eliminar");

    public function mount()
    {
        if(Activity::where('slug', '=', 'reading')->first() === null)
        {
            $activity = new Activity();
            $activity->name = "Lectura";
            $activity->slug = "reading";
            $activity->rules = "1. Lee y contesta.";
            $activity->active = 1;
            $activity->save();
        }
        $this->activityType = Activity::where('slug', '=', 'reading')->first();
        $this->lists = ListExercise::where('user_id', '=', auth()->user()->id)
                                    ->where('activity_id', '=', 2)->get();
    }
    public function render()
    {
        if(Activity::where('slug', '=', 'reading')->first() === null)
        {
            $activity = new Activity();
            $activity->name = "Lectura";
            $activity->slug = "reading";
            $activity->rules = "1. Lee y contesta.";
            $activity->active = 1;
            $activity->save();
        }
        $this->activityType = Activity::where('slug', '=', 'reading')->first();
        return view('livewire.reading-activity-management', ['lists' => ListExercise::where('user_id', '=', auth()->user()->id)
            ->where('deleted', '=', 0)->where('activity_id', '=', $this->activityType->id)->paginate(3)]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function listUpdate(){
        $this->tableActive = 1;
    }
    public function resetOnClose()
    {
        $this->name="";
        $this->difficulty="Fácil";
        $this->description="";
        $this->nameToEdit="";
        $this->diffToEdit="Fácil";
        $this->groupList = [];
        $this->studentList = [];
        $this->lists = ListExercise::where('user_id', '=', auth()->user()->id)
            ->where('deleted', '=', 0)->where('activity_id', '=', 2)->get();
        if($this->tableActive)
        {
            $this->selectedGroup = ListExercise::find($this->selectedGroup->id);
        }
    }
    public function newModal(){
        $this->dispatchBrowserEvent('newModal');
    }
    public function editModal(){
        $this->nameToEdit = $this->selectedGroup->name;
        $this->diffToEdit = $this->selectedGroup->difficulty->name;
        $this->dispatchBrowserEvent('editModal');
    }

    public function clickGroup($groupNumber)
    {
        if($this->tableActive === 1 && $this->selectedGroup->id === $groupNumber)
        {
            $this->tableActive = 0;
            $this->groupStudents = "";
        }
        else
        {
            $this->selectedGroup = ListExercise::find($groupNumber);
            $this->groups = Group::where('owner_id', '=', auth()->user()->id)->get()
                ->where('active', '=', 1);
            $this->listActive = $this->selectedGroup->active;
            $tempResult = Group::with('members')->where('owner_id', '=', auth()->user()->id)
                ->where('deleted', '=', 0)->get()->pluck('members')->all();
            $this->students = new Collection();
            if($tempResult)
            {
                for($j=0; $j < count($tempResult); $j++){
                    $tempResult[0] = $tempResult[0]->merge($tempResult[$j]);
                }
                $this->students = $tempResult[0];
            }

            $this->tableActive = 0;
            $this->emit('listUpdate');

        }
    }
    public function submitGroup()
    {
        $this->validate(['name' => ['required', 'max:128', new IsDefault()]]);
        $list = new ListExercise();
        $list->name = $this->name;
        $list->activity_id = Activity::where('slug', '=', 'reading')->first()->id;
        $list->user_id = auth()->user()->id;
        if(Difficulty::where('name', '=', $this->difficulty)->first() === null)
        {
            $difficulty = new Difficulty();
            $difficulty->name = $this->difficulty;
            $difficulty->save();
        }
        $list->difficulty_id = Difficulty::where('name', '=', $this->difficulty)->first()->id;
        $list->active = 1;
        $list->deleted = 0;
        $list->save();
        $list->owner()->associate(auth()->user()->id);
        $list->difficulty()->associate(Difficulty::where('name', '=', $this->difficulty)->first()->id);
        $list->activity()->associate(Activity::where('slug', '=', 'reading')->first()->id);
        $this->resetOnClose();
        $this->dispatchBrowserEvent('group-added');
    }
    public function editGroup()
    {
        $this->validate(['nameToEdit' => 'required|max:128', 'diffToEdit' => 'required',],
            [
                'nameToEdit.required' => 'Favor proveer un nombre.',
                'nameToEdit.max' => 'El nombre de la lista no puede exceder 128 caracteres.',
                'diffToEdit.required' => 'Favor proveer la dificultad.',
            ],
            ['nameToEdit' => 'Nombre', 'diffToEdit' => 'Dificultad']);
        $this->selectedGroup->name = $this->nameToEdit;
        $this->selectedGroup->active = $this->listActive;
        if(Difficulty::where('name', '=', $this->diffToEdit)->first() === null)
        {
            $difficulty = new Difficulty();
            $difficulty->name = $this->diffToEdit;
            $difficulty->save();
        }
        $this->selectedGroup->difficulty_id = Difficulty::where('name', '=', $this->diffToEdit)->first()->id;
        $this->selectedGroup->save();
        $this->selectedGroup->difficulty()->dissociate();
        $this->selectedGroup->difficulty()->associate($this->diffToEdit);
        $this->dispatchBrowserEvent('group-edited');
        $this->resetOnClose();
    }
    /**
     * Deletes a list of exercises depending on which area of the view it has been called.
     * @param $selectedGroup the group delete button that was selected.
     */
    public function removeListModal($selectedGroup){
        $this->listToRemove = ListExercise::find($selectedGroup);
        $this->dispatchBrowserEvent('removeListModal');
    }


    public function removeList(){
        if($this->tableActive && ($this->listToRemove->id === $this->selectedGroup->id)){
            $this->tableActive = 0;
        }
        $this->listToRemove->deleted = 1;
        $this->listToRemove->save();
        $this->resetOnClose();
        $this->dispatchBrowserEvent('list-removed');
    }

    public function assignListModal(){
        $this->dispatchBrowserEvent('assignListModal');
    }
    public function showAssignedModal($selectedGroup){
        $this->selectedGroup = ListExercise::find($selectedGroup);
        $this->dispatchBrowserEvent('showAssignedModal');
    }
    public function assignList(){

        foreach($this->groupList as $g) {
            $assigneeGroup = Group::find($g);
            $this->selectedGroup->groups()->attach($assigneeGroup);
        }
        foreach($this->studentList as $s){
            $assigneeStudent = User::find($s);
            $this->selectedGroup->users()->attach($assigneeStudent);
        }
        $this->dispatchBrowserEvent('list-assigned');
    }



}
