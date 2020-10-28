<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function index(){
        $pet = Auth::user()->pet;
        return view('Pet.dashboard', compact('pet'));
    }
}
