<?php

namespace App\Http\Controllers;

use App\Models\ListExercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReadingController extends Controller
{
    public function show(ListExercise $list){
        $questions = $list;
        return view('Activity.activity2', compact('questions'));
    }
}
