<?php

namespace App\Http\Livewire;

use App\Models\Paragraph;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Word;
use Livewire\Component;
use Livewire\WithPagination;

class ListQuestions extends Component
{
    use WithPagination;
    public $selectedGroup;
    public $headersStudents = array("Párrafo", "Eliminar");
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
    public $questionToRemove;
    public function render()
    {
        return view('livewire.list-questions', ['questions' => $this->selectedGroup->questions()->paginate(3)]);
    }

    public function resetOnClose(){
        $this->paragraph = "";
        $this->question = "";
        $this->correctOption = "";
        $this->incorrectOption1 = "";
        $this->incorrectOption2 = "";
    }


    public function newQuestionModal(){
        $this->dispatchBrowserEvent('newQuestionModal');
    }
    public function addQuestion(){
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
        $this->dispatchBrowserEvent('question-added');
        $this->resetOnClose();
    }

    public function editQuestionModal($selectedQuestion){
        $this->selectedQuestion = Question::find($selectedQuestion);
        $this->paragraphToEdit = $this->selectedQuestion->paragraph()->first()->text;
        $this->questionToEdit = $this->selectedQuestion->question;
        $this->correctOptionToEdit = $this->selectedQuestion->options()->where('is_correct', '=', 1)->first()->option;
        $this->incorrectOption1ToEdit = $this->selectedQuestion->options()->where('is_correct', '=', 0)->first()->option;
        $this->incorrectOption2ToEdit = $this->selectedQuestion->options()->where('is_correct', '=', 0)->skip(1)->first()->option;
        $this->dispatchBrowserEvent('editQuestionModal');
    }
    public function editQuestion(){
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
        $this->dispatchBrowserEvent('question-edited');
    }
    public function removeQuestionModal($selectedQuestion){
        $this->questionToRemove = Question::find($selectedQuestion);
        $this->dispatchBrowserEvent('removeQuestionModal');
    }
    public function removeQuestion(){
        $this->selectedGroup->questions()->detach($this->questionToRemove);
        $this->resetOnClose();
        $this->dispatchBrowserEvent('question-removed');
    }
}
