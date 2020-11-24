<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RewardType extends Model
{
    use HasFactory;




    public function owned(){

        $rewards = Auth::user()->rewards;
        foreach ($rewards as $reward){
            if($reward->reward_type_id == $this->id){
                return true;
            }

        }
    }
}
