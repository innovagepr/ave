<?php

namespace App\Http\Livewire;

use App\Models\PetType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SelectPet extends Component
{
    public $pet;
//    public function render()
//    {
//        $pet= PetType::all();
//        return view('livewire.select-pet', compact('pet'));
//    }

    public function selectPet($petId){
        $this->emit('refreshShop', $petId);
        $this->dispatchBrowserEvent('selectPet');
    }
}
