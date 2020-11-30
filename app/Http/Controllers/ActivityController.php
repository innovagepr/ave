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
    /**
     * SHOW
     * Function that renders and shows the Activity 1 view
     * @param ListExercise $list
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(ListExercise $list){
        $words = $list->words;
        $user = Auth::user();
//        dd($user->completedActivities);
        return view('Activity.activity1')->with('words',$words)->with('user',$user)->with('list',$list);
    }
}
