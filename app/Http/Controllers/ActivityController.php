<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\Helper;

//Helper::GetApi('drthyershy');

class ActivityController extends Controller
{
    public function show(){

        $user = Auth::user();
        return view('Activity.activity1', compact('user'));
    }

//    public function splitWord(){
//        $var
//    }

//    public function shuffleWord(){
//        str_shuffle()
//    }

}
