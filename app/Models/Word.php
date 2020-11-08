<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    public function difficulty(){
        return $this->belongsTo(difficulty::class);
    }

    public function lists(){
        return $this->belongsToMany(ListExercise::class);
    }

}
