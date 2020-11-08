<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnsweredWord extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function list(){
        return $this->belongsTo(ListExercise::class);
    }

    public function word(){
        return $this->belongsTo(Word::class);
    }
}
