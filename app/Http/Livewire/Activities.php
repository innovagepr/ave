<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\CompletedActivity;
use App\Models\Difficulty;
use App\Models\ListExercise;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Array_;

class Activities extends Component
{

    public $activity;
    public $user;
    public $activities;
    public $index = 0;
    public $total;
    public $levels;
    public $count;
    public $showNext = 'button-show';
    public $showPrev = 'button-hidden';
    public $lists = array();

    public function mount(){
        $this->user = auth()->user();
        $this->activities = Activity::all()->values();
        $this->total = $this->activities->count();
        $this->activity = $this->activities->get($this->index);
        $this->levels = Difficulty::all();
        if($this->user) {
            $this->lists = $this->user->assignedLists()->get();
        }
        foreach ($this->lists as $l){
            if(!CompletedActivity::find($l->id)){
                $this->count++;
            }
        }

    }

    public function change(){
        $this->index = ($this->index + 1) % 2;
        $this->activity = $this->activity = $this->activities->get($this->index);
        if($this->index === 0){
            $this->showPrev = 'button-hidden';
            $this->showNext = 'button-show';
        }
        else if($this->index === ($this->total-1)){
            $this->showPrev = 'button-show';
            $this->showNext = 'button-hidden';
        }
        else{
            $this-> showPrev = 'button-show';
            $this->showNext = 'button-show';
        }
    }

    public function activity($difficulty, $activity){
            $list = ListExercise::where('name','=', 'Palabras')->where('difficulty_id', '=', $difficulty)->first()->id;
            $list2 = ListExercise::where('name','=', 'Lectura')->where('difficulty_id', '=', $difficulty)->first()->id;

            if($activity === 1){
                return redirect()->to('/lista/'.$list);
            }
            else {
                return redirect()->to('/lectura/' . $list2);
            }

    }

    public function showAssigned(){

            return redirect()->to('/ejerciciosAsignados', ['$lists' => $this->lists]);

    }

    public function render()
    {
        return view('livewire.activities');
    }
}
