<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PetSummary extends Component
{

    public $pet;

    public function render()
    {
        return view('livewire.pet-summary');
    }

}
