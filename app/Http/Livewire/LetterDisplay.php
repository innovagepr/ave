<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LetterDisplay extends Component
{
    public $word;
    public $shuffledWord;
    public $splitWord;
    public $answer = [];

    public $count;


    public function placeLetter($position, $letter){
        array_push($this->answer, $letter);
        array_splice($this->splitWord, $position, 1);
//        unset($this->splitWord[$position]);
//        $this->answer = $letter;
    }

    public function removeLetter($position){
//        array_pop($this->answer);
//        array_push($this->splitWord, array_pop($this->answer));

        if(is_int($position)){
            array_splice($this->splitWord, $position,0, array_pop($this->answer));
        } else{
            $pos = array_search($position, array_keys($this->splitWord));
            $this->splitWord = array_merge(
              array_slice($this->splitWord,0,$pos),
                array_pop($this->answer),
                array_slice($this->splitWord,$pos)
            );
        }


      array_splice($this->splitWord,$position, 0, array_pop($this->answer));



    }



    public function render(){
        return view('livewire.letter-display');
    }

    public function shuffleWord(){

        $this->shuffledWord = str_shuffle($this->word);

        if($this->shuffledWord == $this->word){
            $this->shuffleWord();
        }
    }

    public function splitWord(){
        $this->splitWord = str_split($this->shuffledWord);
    }

    public function mount(){
        $this->shuffleWord();
        $this->splitWord();
    }

}
