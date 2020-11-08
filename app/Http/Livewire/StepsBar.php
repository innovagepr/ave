<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StepsBar extends Component
{
    public function render()
    {
        return view('livewire.steps-bar');
    }

    public function goTo(){
        dd("Hello!");
    }
}
