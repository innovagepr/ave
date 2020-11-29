<?php

namespace App\Models;

use App\Http\Livewire\PetAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RewardType extends Model
{
    use HasFactory;

    /**
     * OWNED
     * Function that returns true if an reward article in the Rewards Store is already owned by the user
     * @return bool
     */
    public function owned(){
        $rewards = Auth::user()->rewards;
        foreach ($rewards as $reward){
            if($reward->reward_type_id == $this->id){
                return true;
            }
        }
    }

    /**
     * SELECTED
     * Function that returns true if an reward article is selected in the Pet Dashboard screen
     * @return bool
     */
    public function selected(){
        $rewards = Auth::user()->pet->pet_rewards;
        foreach ($rewards as $reward){
            if($reward->id == $this->id){
                return true;
            }
        }
    }
}
