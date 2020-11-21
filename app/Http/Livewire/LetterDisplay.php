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

    public $tempAnswers = [];
    public $tempSplitWords = [];
    public $tempPosition = [];
    public $words2 = [];


    public function render(){
        return view('livewire.letter-display');
    }

    public function placeLetter($position, $letter){
        if($letter != ' ') {
            array_push($this->positions, $position);
            array_splice($this->answer, $this->position2, 1, $letter);
            array_splice($this->splitWord, $position, 1, " ");
            $this->position2++;
            $this->joinedAnswer();
            $this->tempSplitWords[$this->step] = $this->splitWord;
            $this->tempAnswers[$this->step] = $this->answer;
            $this->tempPosition[$this->step] = $this->position2;
        }
    }

    public function removeLetter(){
        if($this->position2 >= 1) {
            $this->position2--;
            $temp = array_splice($this->answer, $this->position2, 1, " ");
            array_splice($this->splitWord, array_pop($this->positions), 1, $temp);
            $this->tempSplitWords[$this->step] = $this->splitWord;
            $this->tempAnswers[$this->step] = $this->answer;
            $this->tempPosition[$this->step] = $this->position2;

        }
    }

    public function splitshuffle($word){
        $temp = $word;
        $word = preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);
        shuffle($word );
//Evita que salga igual a la palabra original
        if($temp == $word){
            $this->splitshuffle();
        }
        return $word;
    }


//    public function splitshuffle($word){
//        $word = preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);
//        $word = $this->shuffleWord2($word);
//        return $word;
//    }


    public function mount(){

        $counter = 0;
        foreach ($this->words as $palabra){
            $this->words2[$counter] = $palabra->word;
            $this->tempAnswers[$counter] = array_fill(0,strlen($palabra->word),'');
            $this->tempSplitWords[$counter] = $this->splitshuffle($palabra->word);
            $this->tempPosition[$counter] = 0;
            $counter++;
        }

//        dd($this->tempAnswers,$this->tempSplitWords, $this->tempPosition, $this->words2);
        $this->word = $this->words[$this->step]->word;
        $this->splitWord =  $this->tempSplitWords[$this->step];
        $this->answer =  $this->tempAnswers[$this->step];

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


            $this->position2 = $this->tempPosition[$this->step];
            $this->word = $this->words[$this->step]->word;
            $this->splitWord =  $this->tempSplitWords[$this->step];
            $this->answer =  $this->tempAnswers[$this->step];

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
        for ($j = 0; $j < strlen($this->words[$this->step]->word); $j++){
            $this->removeLetter();
        }
    }

    public function goTo($step1){

        $this->tempAnswers[$this->step] = $this->answer;


        if($this->step != $step1) {

            $this->step = $step1;
            $this->word = $this->words[$this->step]->word;
            $this->emit('refreshAudio', $this->word);

// Reset variables
            $this->shuffledWord = $this->tempSplitWords[$this->step];
            $this->splitWord = $this->tempSplitWords[$this->step];
            $this->joinedAnswer = null;

            $this->position2 =  $this->tempPosition[$this->step];


            $this->answer = $this->tempAnswers[$this->step];


        }
    }
    public function quitWarning(){
        $this->dispatchBrowserEvent('quitWarning');
    }
}
