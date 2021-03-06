<?php

namespace App\Http\Livewire;

use App\Models\CompletedActivity;
use App\Models\QuestionOption;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * Livewire Component for the Reading Comprehension Activity
 * Class Activity2
 * @package App\Http\Livewire
 */
class Activity2 extends Component
{
    public $activity = null;
    protected $rules = [
        'option' => 'required',
    ];
    protected $messages = [
        'option.required' => 'Favor escoger una opción.',
    ];
    protected $listeners = [
        'resetTemp',
    ];
    public $step = 0;
    public $remainingExercises = 0;
    public $exerciseKey;
    public $exerciseNumber = 0;
    public $key;
    public $idNumber = 0;
    public $score = 0;
    public $hiddenScore = 0;
    public $option;
    public $studentAnswers = array();
    public $tempAnswers = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    public $badAnswers = [];
    public $exerciseList;
    public $exercises;
    public $answeredFlag = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    public $currentExercise;
    public $answers;
    public $tempStep = 0;
    public $correctAnswer;
    public $user;
    public $incorrectAnswer;
    public $earnedCoins = 0;
    public $earnedPoints = 0;


    public function resetOnAdvance(){
        $this->option = "";
        if($this->tempAnswers[$this->step]){
            $this->option = $this->tempAnswers[$this->step];
        }
    }
    public function resetTemp(){
        $this->tempAnswers[$this->tempStep] = 0;
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
            $this->tempAnswers[$this->step] = $this->option;
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
            $this->tempStep = $this->step;
            $this->option = QuestionOption::find($this->option);
            if($this->option->is_correct){
                $this->score++;
                $this->earnedCoins += 2;
                $this->earnedPoints += 2;
                $this->dispatchBrowserEvent('correctAnswer');
            }
            else{
                $this->incorrectAnswer = $this->option->option;
                $this->correctAnswer = $this->currentExercise->options()->get()->where('is_correct', '=', 1)->first()->option;
                array_push($this->badAnswers,[$this->step + 1,$this->correctAnswer, $this->incorrectAnswer]);
                $this->dispatchBrowserEvent('incorrectAnswer');
            }
                $this->answeredFlag[$this->step] = 1;
            if($this->step === 9){
                if(array_search(0, array_reverse($this->answeredFlag)) != null)
                {
                    $this->goTo(array_search(0, $this->answeredFlag));
                }
            }
                else if (array_search(0, $this->answeredFlag)) {
                    $this->goTo(array_search(0, $this->answeredFlag));
                } else if (array_count_values($this->answeredFlag)[0] === null) {
                    $this->submitExercises();
                }
                $this->emit('resetTemp');
                $this->remainingExercises++;
                $this->resetOnAdvance();
    }

    public function quitWarning(){
        if($this->remainingExercises < 10){
            $this->dispatchBrowserEvent('quitWarning', $this->remainingExercises);
            $this->emit('refreshWarning', $this->remainingExercises);
        }else {
            $this->submitExercises();
        }
    }
    public function submitExercises(){
        foreach($this->tempAnswers as $answer){
            if($answer) {
                $exerciseNumber = $this->exercises[array_search($answer, $this->tempAnswers )];
                $check = QuestionOption::find($answer);
                if ($check->is_correct) {
                    $this->score++;
                    $this->earnedCoins += 5;
                    $this->earnedPoints += 2;
                }
                else{
                    $this->incorrectAnswer = $check->option;
                    $this->correctAnswer = $exerciseNumber->options()->get()->where('is_correct', '=', 1)->first()->option;
                    array_push($this->badAnswers,[array_search($answer, $this->tempAnswers) + 1,$this->correctAnswer, $this->incorrectAnswer]);
                }
            }
        }
        if(auth()->user()){
            $completedActivity = new CompletedActivity();
            $completedActivity->activity_id = $this->activity->activity_id;
            $completedActivity->user_id = auth()->user()->id;
            $completedActivity->difficulty_id = $this->activity->difficulty_id;
            $completedActivity->final_score = $this->score;
            $completedActivity->list_id = $this->activity->id;
            $completedActivity->save();
            $coins = auth()->user()->coins+$this->earnedCoins;
            $points = auth()->user()->points+$this->earnedPoints;
            $this->user = auth()->user();
            $pet = Auth::user()->pet;
            $petPoints = $points/2;
            $level = $this->user->level;
            $petLevel = $pet->level;
            $remainingLevel = ((20*$level)-$points);
            $petRemaining = ((20*$petLevel)-$petPoints);
            $this->user->coins = $coins;
            $this->user->points = $points;
            $pet->points = $petPoints;


            if($remainingLevel <= 0){
                $level++;
                $this->user->level = $level;
            }
            if($petRemaining <= 0){
                $petLevel++;
                $pet->level = $petLevel;
            }
            $pet->save();
            $this->user->save();
        }
        $this->dispatchBrowserEvent('results');
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
    $this->exercises = $this->activity->questions()->get();
    $this->exercises = $this->exercises->shuffle();
    $this->currentExercise = $this->exercises[0];
    }
}
