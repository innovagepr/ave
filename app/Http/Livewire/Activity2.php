<?php

namespace App\Http\Livewire;

use App\Models\ListExercise;
use App\Models\Question;
use Livewire\Component;

/**
 * Livewire Component for the Reading Comprehension Activity
 * Class Activity2
 * @package App\Http\Livewire
 */
class Activity2 extends Component
{
    protected $rules = [
        'option' => 'required',
    ];
    protected $messages = [
        'option.required' => 'Favor escoger una opción.',
    ];
    public $step = 0;
    public $exerciseKey;
    public $exerciseNumber = 0;
    public $key;
    public $idNumber = 0;
    public $score = 0;
    public $option;
    public $studentAnswers = array();
    public $tempAnswers = [];
    public $exerciseList;
    public $exercises;
    public $currentExercise;
    public $answers;
    public $correctAnswers;


    public function resetOnAdvance(){
        $this->option = "";
    }
    /**
     * Sets the currently selected answer based on the radio button that is pressed.
     * @param $option the answer that has been chosen
     */
    public function setAnswer($option){
        $this->option= $option;
    }
    public function goTo($step1){
        if($this->step != $step1) {
            $this->step = $step1;
            $this->currentExercise = $this->exercises[$this->step];
            $this->resetOnAdvance();
        }
    }
    /**
     *Proceeds to the next exercise, and instructs the front-end to show a modal detailing if the exercise was correct or not.
     */
    public function nextExercise(){
        if($this->step == 9){
            $this->dispatchBrowserEvent('results' );
        }
        else{
            $this->validate();
            if($this->option->is_correct){
                $this->score++;
                $this->dispatchBrowserEvent('correctAnswer' );
            }
            else{
                $this->dispatchBrowserEvent('incorrectAnswer' );
            }
            $this->step++;
            $this->exerciseNumber++;
            $this->idNumber++;
            $this->resetOnAdvance();
        }

    }

    /**
     * renders the view.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * the file associated with the front-end view for this function.
     */
    public function render()
    {
        return view('livewire.activity2');
    }

    public function mount(){
    $this->exercises = ListExercise::find(3)->questions()->get();
    $this->exercises = $this->exercises->shuffle();
    $this->currentExercise = $this->exercises[0];

    }
}
