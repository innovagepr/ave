<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use Livewire\Component;

class Activities extends Component
{

    public $activity = 'palabritas';
    public $showNext = 'button-show';
    public $showPrev = 'button-hidden';

    protected $listeners = ['nextOption' => 'next', 'previousOption' => 'prev'];


    public function next(){
        $this -> activity = 'lecturitas';
        $this -> showPrev = 'button-show';
    }

    public function prev(){
        $this -> activity = 'palabritas';
        $this -> showPrev = 'button-hidden';

    }


    public function render()
    {
        return view('livewire.activities');
    }
}
