<?php

namespace App\Http\Livewire;

use App\Models\Pet;
use App\Models\RewardType;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PetSummary extends Component
{

    public $pet;
    private $avatar;


    public function render()
    {
        $data['pet'] = Auth::user()->pet;
        $data['rewards'] = RewardType::all();
        return view('livewire.pet-summary', compact('data'));
    }

//    public function mount(){
//        $this->avatar = new PetAvatar;
//        $this->avatar->set_background("#000000");
////        $this->avatar->set_background("images/cat1.png");
//        $this->avatar->add_layer("images/pet_layers/catBase.png");
//        $this->avatar->add_layer("images/pet_layers/cap.png");
//        $this->avatar->set_filename('pingadulce.png');
//        $this->avatar->build();
//
//    }

    public function changeColor($color){
        $this->pet->background_Color = $color;
        $this->pet->save();
        $this->pet = $this->pet->fresh();
    }

    public function buildAvatar(){
//        $this->avatar = new PetAvatar;
//        $this->avatar->set_background("#000000");
////        $this->avatar->set_background("images/cat1.png");
//        $this->avatar->add_layer("images/pet_layers/catBase.png");
//        $this->avatar->add_layer("images/pet_layers/cap.png");
//        $this->avatar->set_filename('avatar_'.Auth::user()->id.'.png');
//        $this->avatar->build();

        dd('avatar_'.Auth::user()->id.'.png');
    }


}
