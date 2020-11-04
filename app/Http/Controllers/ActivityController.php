<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\Helper;


//Helper::GetApi('drthyershy');

class ActivityController extends Controller
{


    public function show(){
        $word = Word::first()->word;
        $user = Auth::user();
        return view('Activity.activity1', compact('word'));
    }
}
