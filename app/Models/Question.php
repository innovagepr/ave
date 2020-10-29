<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function lists(){
        return $this->belongsTo(ListExercise::class);
    }

    public function difficulty(){
        return $this->belongsTo(difficulty::class);
    }

    public function options(){
        return $this->hasMany(QuestionOption::class);
    }

    public function paragraph(){
        return $this->belongsTo(Paragraph::class);
    }
}
