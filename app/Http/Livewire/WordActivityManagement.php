<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\Difficulty;
use App\Models\Group;
use App\Models\User;
use App\Models\ListExercise;
use App\Models\Word;
use App\Rules\IsDefault;
use Illuminate\Support\Collection;
use Livewire\WithPagination;
use Livewire\Component;

class WordActivityManagement extends Component
{
    use WithPagination;
    protected $rules = [
        'name' => 'required|max:128',

    ];
    protected $messages = [
        'name.required' => 'Favor proveer un nombre.',
        'name.max' => 'El nombre de la lista no puede exceder 128 caracteres.',
    ];
    public $tempDate;
    public $name;
    public $tableActive;
    public $word;
    public $difficulty= "Fácil";
    public $nameToEdit;
    public $diffToEdit;
    public $listToRemove;
    public $wordToRemove;
    public $groups;
    public $test = [];
    public $test2 = [];
    public $testGroup = "";
    public $testStudent = "";
    public $students = [];
    public $selectedGroup;
    public $description;
    public $groupStudents = array();
    public $selectedGroupName;
    public $creationdate;
    public $members;
    public $email;
    public $studentID = 7;
    public $active = true;
    public $headersGroups = array("Nombre", "Dificultad", "Cantidad", "Grupo", "Eliminar");
    public $headersStudents = array("Palabra", "Eliminar");
    //public $lists;
    public function mount()
    {
        $this->lists = ListExercise::where('user_id', '=', auth()->user()->id)->get();
    }
    public function render()
    {
        return view('livewire.word-activity-management', ['lists' => ListExercise::where('user_id', '=', auth()->user()->id)
                                                                ->where('active', '=', 1)->paginate(3)]);
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function resetOnClose()
    {
        $this->name="";
        $this->difficulty="Fácil";
        $this->description="";
        $this->nameToEdit="";
        $this->diffToEdit="Fácil";
        $this->word="";
        $this->lists = ListExercise::where('user_id', '=', auth()->user()->id)->get();
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
        $this->diffToEdit = $this->selectedGroup->difficulty;
        $this->dispatchBrowserEvent('editModal');
    }
    public function newStudentModal(){
        $this->dispatchBrowserEvent('newStudentModal');
    }
    public function assignListModal(){
        $this->dispatchBrowserEvent('assignListModal');
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
            $tempResult = Group::with('members')->where('owner_id', '=', auth()->user()->id)
                ->where('active', '=', 1)->get()->pluck('members')->all();
            $this->students = new Collection();
            for($j=0; $j < count($tempResult); $j++){
                $tempResult[0] = $tempResult[0]->merge($tempResult[$j]);
            }
            $this->students = $tempResult[0];
            $this->tableActive = 1;

        }
    }
    public function submitGroup()
    {
        $this->validate(['name' => ['required', 'max:128', new IsDefault()]]);
        $list = new ListExercise();
        $list->name = $this->name;
        if(Activity::where('slug', '=', 'Lectura')->first() === null)
        {
            $activity = new Activity();
            $activity->name = "Lectura";
            $activity->slug = "Lectura";
            $activity->rules = "Lee el párrafo cuidadosamente y escoge la opción correcta!";
            $activity->active = 1;
            $activity->save();
        }
        $list->activity_id = Activity::where('slug', '=', 'Lectura')->first()->id;
        $list->user_id = auth()->user()->id;
        if(Difficulty::where('name', '=', $this->difficulty)->first() === null)
        {
            $difficulty = new Difficulty();
            $difficulty->name = $this->difficulty;
            $difficulty->save();
        }
        $list->difficulty_id = Difficulty::where('name', '=', $this->difficulty)->first()->id;
        $list->active = 1;
        $list->save();
        $list->owner()->associate(auth()->user()->id);
        $list->difficulty()->associate(Difficulty::where('name', '=', $this->difficulty)->first()->id);
        $list->activity()->associate(Activity::where('slug', '=', 'Lectura')->first()->id);
        $this->resetOnClose();
        $this->dispatchBrowserEvent('group-added');
    }
    public function editGroup()
    {
        $this->validate(['nameToEdit' => 'required|max:128', 'diffToEdit' => 'required',],
            [
                'nameToEdit.required' => 'Favor proveer un nombre.',
                'nameToEdit.max' => 'El nombre de la lista no puede exceder 128 caracteres.',
            ],
            ['nameToEdit' => 'Nombre', 'diffToEdit' => 'Dificultad']);
        $this->selectedGroup->name = $this->nameToEdit;
        $this->selectedGroup->save();
        $this->selectedGroup->difficulty()->dissociate();
        if(Difficulty::where('name', '=', $this->diffToEdit)->first() === null)
        {
            $difficulty = new Difficulty();
            $difficulty->name = $this->difficulty;
            $difficulty->save();
        }
        $this->selectedGroup->difficulty()->associate($this->diffToEdit);
        $this->dispatchBrowserEvent('group-edited');
        $this->resetOnClose();
    }
    public function removeListModal($selectedGroup){
        $this->listToRemove = ListExercise::find($selectedGroup);
        $this->dispatchBrowserEvent('removeListModal');
    }

    /**
     * Removes a group depending on which area of the view it has been called.
     * @param $selectedGroup the group delete button that was selected.
     */
    public function removeList(){
        if($this->tableActive && ($this->listToRemove->id === $this->selectedGroup->id)){
            $this->tableActive = 0;
        }
        $this->listToRemove->active = 0;
        $this->listToRemove->save();
        $this->resetOnClose();
        $this->dispatchBrowserEvent('list-removed');
    }
    public function addStudent(){
        $this->validate(['word' => 'required|max:32'],
            [
                'word.required' => 'Favor proveer una palabra.',
                'word.max' => 'La palabra no puede exceder 32 caracteres.',
            ],
            ['word' => 'Palabra']);
        $wordToAdd = new Word();
        $wordToAdd->difficulty_id = $this->selectedGroup->difficulty_id;
        $wordToAdd->word = $this->word;
        $wordToAdd->save();
        $group = ListExercise::find($this->selectedGroup->id);
        $group->words()->attach($wordToAdd);
        $this->dispatchBrowserEvent('student-added');
        $this->resetOnClose();
    }
    public function assignList(){

        foreach($this->test as $g) {
            $this->testGroup = Group::find($g);
            $assigneeGroup = Group::find($g);
            $this->selectedGroup->groups()->attach($assigneeGroup);
        }
        foreach($this->test2 as $s){
            $this->testStudent = User::find($s);
            $assigneeStudent = User::find($s);
            $this->selectedGroup->users()->attach($assigneeStudent);
        }
    $this->dispatchBrowserEvent('list-assigned');
}
    public function removeWordModal($selectedWord){
        $this->wordToRemove = Word::find($selectedWord);
        $this->dispatchBrowserEvent('removeWordModal');
    }
    /**
     * Removes a student depending on which area of the view it has been called.
     * @param $selectedStudent the student delete button that was selected.
     */
    public function removeWord(){
        $this->selectedGroup->words()->detach($this->wordToRemove);
        $this->resetOnClose();
        $this->dispatchBrowserEvent('word-removed');
    }
}
