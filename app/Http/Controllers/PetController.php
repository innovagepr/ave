<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function index(){
        $pet = Auth::user()->pet;
        $user = Auth::user();
        return view('Pet.dashboard', compact('user'));
    }
}
