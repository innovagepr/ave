<?php

namespace App\Http\Livewire;

use App\Models\AnsweredWord;
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
    public $step = 0;
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
        shuffle($this->splitWord );

//Evita que salga igual a la palabra original
        $temp = join($this->splitWord);
        if($temp == $this->word){
            $this->shuffleWord();
        }
    }

    public function splitWord(){
        $this->splitWord  = preg_split('//u', $this->word, null, PREG_SPLIT_NO_EMPTY);
    }

    public function mount(){
        $this->word = $this->words[$this->step]->word;
        $this->splitWord();
        $this->shuffleWord();
        $this->answer = array_fill(0,count($this->splitWord),'');

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
            $this->shuffledWord = null;
            $this->splitWord = null;
            $this->joinedAnswer = null;

            $this->answer = [];
            $this->position2 = 0;
            $this->positions = [];
            $this->splitWord();
            $this->shuffleWord();
            $this->answer = array_fill(0,count($this->splitWord),'');
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

    public function clearAll(){
        for ($j = 0; $j < strlen($this->word); $j++){
            $this->removeLetter();
        }
    }

    public function goTo($step1){

        if($this->step != $step1) {

            $this->step = $step1;
            $this->word = $this->words[$this->step]->word;
            $this->emit('refreshAudio', $this->word);
// Reset variables
            $this->shuffledWord = null;
            $this->splitWord = null;
            $this->joinedAnswer = null;

            $this->position2 = 0;
            $this->positions = [];
            $this->splitWord();
            $this->shuffleWord();
            $this->answer = array_fill(0, count($this->splitWord), '');


        }
    }
}
