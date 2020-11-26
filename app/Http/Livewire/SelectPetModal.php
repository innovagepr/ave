<?php

namespace App\Http\Livewire;

use App\Models\PetType;
use App\Models\RewardType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SelectPetModal extends Component
{
    public $petId;

    public $name;

    protected $rules = [
        'name' => 'required|max:128',
    ];

    protected $listeners = ['refreshShop'=>'refreshMe'];

    public function refreshMe($petId){
        $this->petId = $petId;
    }

    public function render()
    {
        $data['petUser'] = Auth::user();
        $data['petType'] = PetType::all();
        return view('livewire.select-pet-modal', compact('data'));
    }

    public function confirmPet($petId){
        $this->validate();
        $user = auth()->user();

        $user->pet()->create([
            'pet_type_id' => $petId,
            'name'=>$this->name
        ]);
        $user->save();
        return view ('livewire.child-summary');
    }
}
