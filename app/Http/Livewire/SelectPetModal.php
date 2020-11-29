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
    private $avatar;

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

    public function confirmPet(PetType $petType){
        $this->validate();
        $user = auth()->user();

        $user->pet()->create([
            'pet_type_id' => $petType->id,
            'name'=>$this->name
        ]);
        $user->save();

//Generate Avatar base Image------

        $this->avatar = new PetAvatar;
        if($petType->slug == "perro"){
            $this->avatar->add_layer("images/pet_layers/dogBase.png");
        } else{
            $this->avatar->add_layer("images/pet_layers/catBase.png");
        }
        $this->avatar->set_filename('avatar_'.Auth::user()->id.'.png');
        $this->avatar->build();
//--------------------------------------
        return redirect('/dashboard');
    }
}
