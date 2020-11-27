<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use App\Models\RewardType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RewardController extends Controller
{
    public function index(){
        $pet = Auth::user()->pet;
        $user = Auth::user();
        return view('Pet.reward-store', compact('pet'));
    }
}
