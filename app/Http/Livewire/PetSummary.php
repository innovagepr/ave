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

    /**
     * Render
     * Renders the view of the pet Dashboard with the data in the parameters
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $data['pet'] = Auth::user()->pet;
        $data['rewards'] = RewardType::all();
        return view('livewire.pet-summary', compact('data'));
    }

    /**
     * ChangeColor
     * Function to change the background color of the pet Avatar
     * @param $color
     */
    public function changeColor($color){
        $this->pet->background_Color = $color;
        $this->pet->save();
        $this->pet = $this->pet->fresh();
    }

    /**
     * Build Avatar
     * This function generates the avatar image with the selected reward items of the user.
     * @param RewardType $item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function buildAvatar(RewardType $item){
        $this->avatar = new PetAvatar;

        if($this->pet->petType->slug == "perro"){
            $this->avatar->add_layer("images/pet_layers/dogBase.png");
        } else{
            $this->avatar->add_layer("images/pet_layers/catBase.png");
        }

        $this->avatar->add_layer($item->icon_url);

        foreach($this->pet->pet_rewards as $reward  ) {
            $this->avatar->add_layer($reward->icon_url);
        }

        $this->avatar->set_filename('avatar_'.Auth::user()->id.'.png');
        $this->avatar->build();
        $this->pet->pet_rewards()->attach($item);
        $this->pet->save();
        return redirect('/mascota');
    }

    /**
     * Detach Item
     * This functions generates the avatar image removing the selected reward item.
     * @param RewardType $item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function detachItem(RewardType $item){
        $this->pet->pet_rewards()->detach($item);
        $this->avatar = new PetAvatar;

        if($this->pet->petType->slug == "perro"){
            $this->avatar->add_layer("images/pet_layers/dogBase.png");
        } else{
            $this->avatar->add_layer("images/pet_layers/catBase.png");
        }
        foreach($this->pet->pet_rewards as $reward) {
            $this->avatar->add_layer($reward->icon_url);
        }
        $this->avatar->set_filename('avatar_'.Auth::user()->id.'.png');
        $this->avatar->build();
        $this->pet->save();
        return redirect('/mascota');
    }
}
