<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the rewards records associated with the user.
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get the rewardType records associated with the rewards.
     */
    public function rewardType(){
        return $this->belongsTo(RewardType::class);
    }

    /**
     * Get the name records associated with the rewardType.
     */
    public function name(){
        return $this->rewardType->name;
    }
}
