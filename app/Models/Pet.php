<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function petType(){
        return $this->belongsTo(PetType::class);
    }

    public function pet_rewards()
    {
        return $this->belongsToMany(RewardType::class,'pet_avatars');
    }
}
