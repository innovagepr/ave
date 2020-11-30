<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\Difficulty;
use App\Models\ListExercise;
use Livewire\Component;

class Activities extends Component
{

    public $activity;
    public $activities;
    public $index = 0;
    public $total;
    public $levels;
    public $count = 0;
    public $showNext = 'button-show';
    public $showPrev = 'button-hidden';
    public $lists = array();

    public function mount(){
        $this->activities = Activity::all()->values();
        $this->total = $this->activities->count();
        $this->activity = $this->activities->get($this->index);
        $this->levels = Difficulty::all();
        $this->lists = auth()->user()->assignedLists()->get();
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

    public function showAssigned(){

            return redirect()->to('/ejerciciosAsignados');

    }

    public function render()
    {
        return view('livewire.activities');
    }
}
