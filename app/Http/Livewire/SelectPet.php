<?php

namespace App\Http\Livewire;

use App\Models\PetType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SelectPet extends Component
{
    public $pet;

    /**
     * SELECT PET
     *Function to dispatch an event that excecutes a Modal for the selection of the pet. Sends the pet Id as parameter.
     * @param $petId
     */
    public function selectPet($petId){
        $this->emit('refreshShop', $petId);
        $this->dispatchBrowserEvent('selectPet');
    }
}
