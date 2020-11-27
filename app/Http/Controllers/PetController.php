<?php

namespace App\Http\Controllers;

use App\Models\PetType;
use App\Models\RewardType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function index(){
        $pet = Auth::user()->pet;
        $user = Auth::user();
        return view('Pet.dashboard', compact('pet'));
    }

    public function select(){
//        $data['petType'] = PetType::all();
//        $data['userPet'] =Auth::user()->pet;
        $pet = PetType::all();
        $user = Auth::user();
        return view ('Pet.pet-selection', compact('pet'));
    }
}
