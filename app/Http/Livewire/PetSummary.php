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

    public function changeColor($color){
        $this->pet->background_Color = $color;
        $this->pet->save();
        $this->pet = $this->pet->fresh();
    }

    public function quitHat(){
        dd("Sombrero");
    }
}
