<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function rewardType(){
        return $this->belongsTo(RewardType::class);
    }

    public function name(){
        return $this->rewardType->name;
    }
}
