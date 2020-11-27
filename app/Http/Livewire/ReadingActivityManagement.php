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
    public $tempDate;
    public $name;
    public $tableActive;
    public $paragraph;
    public $question;
    public $selectedQuestion;
    public $correctOption;
    public $incorrectOption1;
    public $incorrectOption2;
    public $paragraphToEdit;
    public $questionToEdit;
    public $correctOptionToEdit;
    public $incorrectOption1ToEdit;
    public $incorrectOption2ToEdit;
    public $difficulty= "Fácil";
    public $nameToEdit;
    public $diffToEdit;
    public $listToRemove;
    public $wordToRemove;
    public $groups;
    public $listActive;
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
    public $activityType;
    public $studentID = 7;
    public $active = true;
    public $headersGroups = array("Nombre", "Dificultad", "Cantidad", "Asignada a", "Activa", "Eliminar");
    public $headersStudents = array("Párrafo", "Eliminar");
    //public $lists;
    public function mount()
    {
        if(Activity::where('slug', '=', 'Lectura')->first() === null)
        {
            $activity = new Activity();
            $activity->name = "Lectura";
            $activity->slug = "Lectura";
            $activity->rules = "Lee el párrafo cuidadosamente y escoge la opción correcta!";
            $activity->active = 1;
            $activity->save();
        }
        $this->activityType = Activity::where('slug', '=', 'Lectura')->first();
        $this->lists = ListExercise::where('user_id', '=', auth()->user()->id)
                                    ->where('activity_id', '=', 2)->get();
    }
    public function render()
    {
        if(Activity::where('slug', '=', 'Lectura')->first() === null)
        {
            $activity = new Activity();
            $activity->name = "Lectura";
            $activity->slug = "Lectura";
            $activity->rules = "Lee el párrafo cuidadosamente y escoge la opción correcta!";
            $activity->active = 1;
            $activity->save();
        }
        $this->activityType = Activity::where('slug', '=', 'Lectura')->first();
        return view('livewire.reading-activity-management', ['lists' => ListExercise::where('user_id', '=', auth()->user()->id)
            ->where('deleted', '=', 0)->where('activity_id', '=', $this->activityType->id)->paginate(3)]);
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
        $this->paragraph = "";
        $this->question = "";
        $this->correctOption = "";
        $this->incorrectOption1 = "";
        $this->incorrectOption2 = "";
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
            $this->students = $tempResult[0];
            $this->tableActive = 1;

        }
    }
    public function submitGroup()
    {
        $this->validate(['name' => ['required', 'max:128', new IsDefault()]]);
        $list = new ListExercise();
        $list->name = $this->name;
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
        $list->deleted = 0;
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
        $this->listToRemove->deleted = 1;
        $this->listToRemove->save();
        $this->resetOnClose();
        $this->dispatchBrowserEvent('list-removed');
    }
    public function addStudent(){
        $this->validate(['paragraph' => 'required', 'question' => 'required|max:128', 'correctOption' => 'required|max:128',
            'incorrectOption1' => 'required|max:128', 'incorrectOption2' => 'required|max:128',],
            [
                'paragraph.required' => 'Favor proveer un párrafo.',
                'question.required' => 'Favor proveer una pregunta.',
                'question.max' => 'La pregunta no debe exceder 128 caracteres.',
                'correctOption.required' => 'Favor proveer la opción correcta.',
                'correctOption.max' => 'El texto de la opción no debe exceder 128 caracteres.',
                'incorrectOption1.required' => 'Favor proveer la opción incorrecta.',
                'incorrectOption1.max' => 'El texto de la opción no debe exceder 128 caracteres.',
                'incorrectOption2.required' => 'Favor proveer la opción incorrecta.',
                'incorrectOption2.max' => 'El texto de la opción no debe exceder 128 caracteres.',
            ],
            ['paragraph' => 'Párrafo', 'question' => 'Pregunta', 'correctOption' => 'Opción Correcta',
                'incorrectOption1' => 'Opción Incorrecta 1', 'incorrectOption2' => 'Opción Incorrecta 2']);
        $paragraphToAdd = new Paragraph();
        $paragraphToAdd->text = $this->paragraph;
        $paragraphToAdd->save();
        $questionToAdd = new Question();
        $questionToAdd->paragraph_id = $paragraphToAdd->id;
        $questionToAdd->list_id = $this->selectedGroup->id;
        $questionToAdd->difficulty_id = $this->selectedGroup->difficulty_id;
        $questionToAdd->question = $this->question;
        $questionToAdd->save();
        $this->selectedGroup->questions()->attach($questionToAdd);
        $questionToAdd->paragraph()->associate($paragraphToAdd);
        $correctOptionToAdd = new QuestionOption();
        $correctOptionToAdd->question_id = $questionToAdd->id;
        $correctOptionToAdd->option = $this->correctOption;
        $correctOptionToAdd->is_correct = 1;
        $correctOptionToAdd->save();
        $incorrectOption1ToAdd = new QuestionOption();
        $incorrectOption1ToAdd->question_id = $questionToAdd->id;
        $incorrectOption1ToAdd->option = $this->incorrectOption1;
        $incorrectOption1ToAdd->is_correct = 0;
        $incorrectOption1ToAdd->save();
        $incorrectOption2ToAdd = new QuestionOption();
        $incorrectOption2ToAdd->question_id = $questionToAdd->id;
        $incorrectOption2ToAdd->option = $this->incorrectOption2;
        $incorrectOption2ToAdd->is_correct = 0;
        $incorrectOption2ToAdd->save();
        $questionToAdd->options()->saveMany([$correctOptionToAdd, $incorrectOption1ToAdd, $incorrectOption2ToAdd]);
        $this->dispatchBrowserEvent('student-added');
        $this->resetOnClose();
    }
    public function editWordModal($selectedWord){
        $this->selectedQuestion = Question::find($selectedWord);
        $this->paragraphToEdit = $this->selectedQuestion->paragraph()->first()->text;
        $this->questionToEdit = $this->selectedQuestion->question;
        $this->correctOptionToEdit = $this->selectedQuestion->options()->where('is_correct', '=', 1)->first()->option;
        $this->incorrectOption1ToEdit = $this->selectedQuestion->options()->where('is_correct', '=', 0)->first()->option;
        $this->incorrectOption2ToEdit = $this->selectedQuestion->options()->where('is_correct', '=', 0)->skip(1)->first()->option;
        $this->dispatchBrowserEvent('editWordModal');
    }
    public function editWord(){
        $this->validate(['paragraphToEdit' => 'required', 'questionToEdit' => 'required|max:128', 'correctOptionToEdit' => 'required|max:128',
            'incorrectOption1ToEdit' => 'required|max:128', 'incorrectOption2ToEdit' => 'required|max:128',],
            [
                'paragraphToEdit.required' => 'Favor proveer un párrafo.',
                'questionToEdit.required' => 'Favor proveer una pregunta.',
                'questionToEdit.max' => 'La pregunta no debe exceder 128 caracteres.',
                'correctOptionToEdit.required' => 'Favor proveer la opción correcta.',
                'correctOptionToEdit.max' => 'El texto de la opción no debe exceder 128 caracteres.',
                'incorrectOption1ToEdit.required' => 'Favor proveer la opción incorrecta.',
                'incorrectOption1ToEdit.max' => 'El texto de la opción no debe exceder 128 caracteres.',
                'incorrectOption2ToEdit.required' => 'Favor proveer la opción incorrecta.',
                'incorrectOption2ToEdit.max' => 'El texto de la opción no debe exceder 128 caracteres.',
            ],
            ['paragraphToEdit' => 'Párrafo', 'questionToEdit' => 'Pregunta', 'correctOptionToEdit' => 'Opción Correcta',
                'incorrectOption1ToEdit' => 'Opción Incorrecta 1', 'incorrectOption2ToEdit' => 'Opción Incorrecta 2']);
        $paragraph = Paragraph::where('id', '=', $this->selectedQuestion->paragraph()->first()->id)->first();
        $paragraph->text = $this->paragraphToEdit;
        $paragraph->save();
        $this->selectedQuestion->question = $this->questionToEdit;
        $this->selectedQuestion->save();
        $correctOption = QuestionOption::where('question_id', '=', $this->selectedQuestion->id)->where('is_correct', '=', 1)->first();
        $correctOption->option = $this->correctOptionToEdit;
        $correctOption->save();
        $incorrectOption1 = QuestionOption::where('question_id', '=', $this->selectedQuestion->id)->where('is_correct', '=', 0)->first();
        $incorrectOption1->option = $this->incorrectOption1ToEdit;
        $incorrectOption1->save();
        $incorrectOption2 = QuestionOption::where('question_id', '=', $this->selectedQuestion->id)->where('is_correct', '=', 0)->skip(1)->first();
        $incorrectOption2->option = $this->incorrectOption2ToEdit;
        $incorrectOption2->save();
        $this->dispatchBrowserEvent('word-edited');
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
        $this->selectedGroup->questions()->detach($this->wordToRemove);
        $this->resetOnClose();
        $this->dispatchBrowserEvent('word-removed');
    }


}
