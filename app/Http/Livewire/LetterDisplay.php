<?php

namespace App\Http\Livewire;

use App\Models\AnsweredWord;
use Illuminate\View\View;
use Livewire\Component;
use function GuzzleHttp\Psr7\str;

class LetterDisplay extends Component
{
    protected $listeners = ['submitExercise'];

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
    public $tempPositionsArray = [];
    public $answeredFlag = [0,0,0,0,0,0,0,0,0,0];

    /**
     * Render
     * Renders the view of the Activity 1 screen (letter-display)
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render(){
        return view('livewire.letter-display');
    }

    /**
     * Place Letter
     * Function to place a selected letter of a shuffled word in the answer boxes
     * @param $position
     * @param $letter
     */
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
            $this->tempPositionsArray[$this->step] = $this->positions;
        }
    }

    /**
     * Remove Letter
     * Removes the last letter of the answers boxes and put it back in the original position in the shuffled letters boxes
     */
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

    /**
     * Split Shuffle
     * Gets a word, shuffles it and divides it into characters. If the shuffled word is equal to the original, shuffles it again.
     * @param $word
     * @return array|false|string[]
     */
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

    /**
     * Mount
     * This functions allows to intercept parameters 
     */
    public function mount(){
        $counter = 0;
        foreach ($this->words as $palabra){
            $this->words2[$counter] = $palabra->word;
            $this->tempAnswers[$counter] = array_fill(0,strlen($palabra->word),'');
            $this->tempSplitWords[$counter] = $this->splitshuffle($palabra->word);
            $this->tempPosition[$counter] = 0;
            $this->tempPositionsArray[$counter] = array_fill(0,strlen($palabra->word),0);
            $counter++;
        }
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
            $this->answeredFlag[$this->step] = 1;
        } else {

            $this->dispatchBrowserEvent('toggleResultModal', $this->joinedAnswer);
            $this->emit('refreshChildren', $this->joinedAnswer, $this->word);
            $this->answeredFlag[$this->step] = 1;
            array_push($this->badAnswers,[$this->step + 1,$joinedWord,$this->word]);
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
            $this->splitWord = $this->tempSplitWords[$this->step];
            $this->answer = $this->tempAnswers[$this->step];
            $this->positions = $this->tempPositionsArray[$this->step];
        }
    }

    public function joinedAnswer(){
        $this->joinedAnswer = implode($this->answer);
    }

    public function submitExercise(){
        $sum = count($this->badAnswers) + count($this->correctAnswers);

        $this->dispatchBrowserEvent('finalResult', $this->badAnswers, $sum);
        $this->emit('refreshFinal', $this->badAnswers, $sum);
        $this->emit('refreshAudio', null);
    }

    public function clearAll(){
        for ($j = 0; $j < strlen($this->words[$this->step]->word); $j++){
            $this->removeLetter();
        }
    }

    public function goTo($step1){

        $this->tempAnswers[$this->step] = $this->answer;
        $this->emit('refreshAudio', $this->word);

        if($this->step != $step1 && !$this->answeredFlag[$step1]) {

            $this->step = $step1;
            $this->word = $this->words[$this->step]->word;
//            $this->emit('refreshAudio', $this->word);

// Reset variables
            $this->shuffledWord = $this->tempSplitWords[$this->step];
            $this->splitWord = $this->tempSplitWords[$this->step];
            $this->joinedAnswer = null;

            $this->position2 =  $this->tempPosition[$this->step];
            $this->answer = $this->tempAnswers[$this->step];
            $this->positions = $this->tempPositionsArray[$this->step];
        }
    }
    public function quitWarning(){
        $sum = count($this->badAnswers) + count($this->correctAnswers);

        if($sum< 10){
            $this->dispatchBrowserEvent('quitWarning', $sum);
            $this->emit('refreshWarning', $sum);
        }else {
            $this->submitExercise();
        }
    }
}
