<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use function GuzzleHttp\Psr7\str;

class LetterDisplay extends Component
{
    protected $listeners = ['lastExercise'];

    public $word;
    public $shuffledWord;
    public $splitWord;
    public $answer = [];
    public $position2 = 0;
    public $positions = [];
    public $joinedAnswer;
    public $words;
    public $step = 9;
    public $correctAnswers = [];
    public $badAnswers = [];


    public function render(){
        return view('livewire.letter-display');
    }

    public function placeLetter($position, $letter){
        array_push($this->positions,$position);
        array_splice($this->answer, $this->position2, 1, $letter);
        array_splice($this->splitWord, $position, 1, " ");
        $this->position2++;
        $this->joinedAnswer();
    }

    public function removeLetter(){
        if($this->position2 >= 1) {
            $this->position2--;
            $temp = array_splice($this->answer, $this->position2, 1, " ");
            array_splice($this->splitWord, array_pop($this->positions), 1, $temp);
        }
    }

    public function shuffleWord(){

        $this->shuffledWord = str_shuffle($this->word);
//Evita que salga igual a la palabra original
        if($this->shuffledWord == $this->word){
            $this->shuffleWord();
        }
    }

    public function splitWord(){
        $this->splitWord = str_split($this->shuffledWord);
    }

    public function mount(){
        $this->word = $this->words[$this->step]->word;
        $this->answer = array_fill(0,strlen($this->word),'');
        $this->shuffleWord();
        $this->splitWord();
    }

//Immediate Result ------------------------------------------------------------------------------------------
    public function immediateResult()
    {
        $joinedWord = implode($this->answer);

        if ($joinedWord == $this->word) {

            $this->dispatchBrowserEvent('immediateResultGood');
            array_push($this->correctAnswers, $joinedWord);

        } else {

            $this->dispatchBrowserEvent('toggleResultModal', $this->joinedAnswer);
            $this->emit('refreshChildren', $this->joinedAnswer, $this->word);
            array_push($this->badAnswers, $joinedWord);
        }
        if ($this->step < 9) {

            $this->step++;
            $this->word = $this->words[$this->step]->word;
            $this->emit('refreshAudio', $this->word);
// Reset variables
            $this->answer = [];
            $this->position2 = 0;
            $this->positions = [];
            $this->answer = array_fill(0, strlen($this->word), '');
            $this->shuffleWord();
            $this->splitWord();
        }
    }

    public function joinedAnswer(){
        $this->joinedAnswer = implode($this->answer);
    }

    public function lastExercise(){
        if($this->step == 9){
            $this->dispatchBrowserEvent('finalResult', $this->joinedAnswer, $this->correctAnswers, $this->badAnswers);
        }
    }
}
