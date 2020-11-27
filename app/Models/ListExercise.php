<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListExercise extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class, 'list_user', 'list_id');
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class, 'group_lists', 'list_id');
    }

    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    public function words(){
        return $this->belongsToMany(Word::class, 'list_words','list_id');
    }

    public function difficulty(){
        return $this->belongsTo(Difficulty::class);
    }

    public function questions(){
        return $this->belongsToMany(Question::class, 'list_questions', 'list_id');
    }

}
