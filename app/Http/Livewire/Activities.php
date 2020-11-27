<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\Difficulty;
use Livewire\Component;

class Activities extends Component
{

    public $activity;
    public $activities;
    public $index = 0;
    public $total;
    public $levels;
    public $showNext = 'button-show';
    public $showPrev = 'button-hidden';

    public function mount(){
        $this->activities = Activity::all()->values();
        $this->total = $this->activities->count();
        $this->activity = $this->activities->get($this->index);
        $this->levels = Difficulty::all();
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

    public function render()
    {
        return view('livewire.activities');
    }
}
