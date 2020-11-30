<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user records associated with the pet.
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get the petType records associated with the pet.
     */
    public function petType(){
        return $this->belongsTo(PetType::class);
    }

    /**
     * Get the rewards records associated with the pet.
     */
    public function pet_rewards()
    {
        return $this->belongsToMany(RewardType::class,'pet_avatars');
    }
}
