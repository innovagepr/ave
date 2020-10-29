<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListExercise extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function groups(){
        return $this->hasMany(Group::class);
    }

    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    public function words(){
        return $this->hasMany(Word::class);
    }

    public function difficulty(){
        return $this->belongsTo(Difficulty::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

}
