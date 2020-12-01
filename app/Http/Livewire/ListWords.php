<?php

namespace App\Http\Livewire;

use App\Models\ListExercise;
use App\Models\Word;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Controllers\ApiController;

class ListWords extends Component
{
    use WithPagination;
    public $selectedGroup;
    public $headersStudents = array("Palabra", "Eliminar");
    public $word;
    public $wordToEdit;
    public $wordToRemove;

    public function render()
    {
        return view('livewire.list-words', ['words' => $this->selectedGroup->words()->paginate(3)]);
    }
    public function resetOnClose(){
        $this->word="";
    }
    public function newWordModal(){
        $this->dispatchBrowserEvent('newWordModal');
    }
    public function addWord(){
        $this->validate(['word' => 'required|min:2|max:15|regex:/^\S*[a-zA-Z]+$/'],
            [
                'word.required' => 'Favor proveer una palabra.',
                'word.min' => 'La palabra debe tener al menos 2 letras.',
                'word.max' => 'La palabra no puede exceder 15 letras.',
                'word.regex' => 'La palabra sólo debe contener letras.',
            ],
            ['word' => 'Palabra']);
        $wordToAdd = new Word();
        $wordToAdd->difficulty_id = $this->selectedGroup->difficulty_id;
        $wordToAdd->word = $this->word;
        $wordToAdd->save();
        $group = ListExercise::find($this->selectedGroup->id);
        $group->words()->attach($wordToAdd);
        ApiController::tts($this->word);
        $this->dispatchBrowserEvent('word-added');
        $this->resetOnClose();
    }
    public function editWordModal($selectedWord){
        $this->wordToEdit = Word::find($selectedWord);
        $this->word = $this->wordToEdit->word;
        $this->dispatchBrowserEvent('editWordModal');
    }
    public function editWord(){
        $this->validate(['word' => 'required|min:2|max:15|regex:/^\S*[a-zA-Z]+$/'],
            [
                'word.required' => 'Favor proveer una palabra.',
                'word.min' => 'La palabra debe tener al menos 2 letras.',
                'word.max' => 'La palabra no puede exceder 15 letras.',
                'word.regex' => 'La palabra sólo debe contener letras.',
            ],
            ['wordt' => 'Palabra']);
        $this->wordToEdit->word = $this->word;
        $this->wordToEdit->save();
        ApiController::tts($this->word);
        $this->dispatchBrowserEvent('word-edited');
    }
    /**
     * Calls a modal to remove a word from a list.
     * @param $selectedWord the word delete button that was selected.
     */
    public function removeWordModal($selectedWord){
        $this->wordToRemove = Word::find($selectedWord);
        $this->dispatchBrowserEvent('removeWordModal');
    }

    /**
     * Removes a word after the user has agreed to remove it with the word remove modal.
     */
    public function removeWord(){
        $this->selectedGroup->words()->detach($this->wordToRemove);
        $this->resetOnClose();
        $this->dispatchBrowserEvent('word-removed');
    }
}
