<?php

namespace App\Http\Livewire;

use App\Models\ListExercise;
use App\Models\Question;
use App\Models\QuestionOption;
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
    public $answeredFlag = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    public $currentExercise;
    public $answers;
    public $correctAnswer;
    public $incorrectAnswer;


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
        if($this->step != $step1 && !$this->answeredFlag[$step1]) {
            $this->step = $step1;
            $this->currentExercise = $this->exercises[$this->step];
            $this->resetOnAdvance();
        }
    }
    /**
     *Proceeds to the next exercise, and instructs the front-end to show a modal detailing if the exercise was correct or not.
     */
    public function nextExercise(){
            $this->validate();
            $this->option = QuestionOption::find($this->option);
            if($this->option->is_correct){
                $this->score++;
                $this->dispatchBrowserEvent('correctAnswer');
            }
            else{
                $this->incorrectAnswer = $this->option->option;
                $this->correctAnswer = $this->currentExercise->options()->get()->where('is_correct', '=', 1)->first()->option;
                $this->dispatchBrowserEvent('incorrectAnswer');
            }
                $this->answeredFlag[$this->step] = 1;
            if($this->step === 9){
                if(array_search(0, $this->answeredFlag) != FALSE)
                {
                    $this->goTo(array_search(0, $this->answeredFlag));
                }
                else{
                    $this->dispatchBrowserEvent('results' );
                }
            }
                else if ($this->answeredFlag[$this->step + 1] && $this->step + 1 < 9) {
                    $this->goTo(array_search(0, $this->answeredFlag));
                } else if ($this->answeredFlag[$this->step + 1] && $this->step + 1 == 9) {
                    $this->dispatchBrowserEvent('results');
                } else {
                    $this->step++;
                }

                $this->resetOnAdvance();
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
