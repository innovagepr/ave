<?php

namespace App\Http\Controllers;

use App\Http\Livewire\AudioApi;
use App\Http\Livewire\LetterDisplay;
use App\Models\ListExercise;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ActivityController extends Controller
{
    public function show(ListExercise $list){
        $words = $list->words;

        //Crea el audio file
        //TODO::Moverlo a cuando se crea el word
//        foreach($words as $word){
//            ApiController::tts($word->word);
//        }
        $user = Auth::user();
        return view('Activity.activity1', compact('words'));
    }
}
