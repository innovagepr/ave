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

//        $this->avatar->build();
//
//    }

    public function changeColor($color){
        $this->pet->background_Color = $color;
        $this->pet->save();
        $this->pet = $this->pet->fresh();
    }

    public function buildAvatar(RewardType $item){

        $this->avatar = new PetAvatar;
//        $this->avatar->set_background('#000000');
//        $this->avatar->set_background("images/savings.png");

        if($this->pet->petType->slug == "perro"){
            $this->avatar->add_layer("images/pet_layers/dogBase.png");
        } else{
            $this->avatar->add_layer("images/pet_layers/catBase.png");
        }

        $this->avatar->add_layer($item->icon_url);

        foreach($this->pet->pet_rewards as $reward  ) {
            $this->avatar->add_layer($reward->icon_url);
        }


//

//
//        if($articleType == "hat"){
//            $this->avatar->add_layer("images/pet_layers/topHat.png");
//        } elseif($articleType == "tie"){
//            $this->avatar->add_layer("images/pet_layers/bowTieRed.png");
//        } elseif($articleType == "bowl"){
//            $this->avatar->add_layer("images/pet_layers/redBowl.png");
//        } elseif($articleType == "toy"){
//            $this->avatar->add_layer("images/pet_layers/ball.png");
//        }

        $this->avatar->set_filename('avatar_'.Auth::user()->id.'.png');
        $this->avatar->build();
        $this->pet->pet_rewards()->attach($item);
        $this->pet->save();
        return redirect('/mascota');
    }

    public function detachItem(RewardType $item){
        $this->avatar = new PetAvatar;


        if($this->pet->petType->slug == "perro"){
            $this->avatar->add_layer("images/pet_layers/dogBase.png");
        } else{
            $this->avatar->add_layer("images/pet_layers/catBase.png");
        }

        foreach($this->pet->pet_rewards as $reward  ) {
            $this->avatar->add_layer($reward->icon_url);
        }
        $this->avatar->set_filename('avatar_'.Auth::user()->id.'.png');
        $this->avatar->build();
        $this->pet->pet_rewards()->detach($item);
        $this->pet->save();
        return redirect('/mascota');
    }


}
