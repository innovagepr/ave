<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('livewire.dashboard');
})->name('dashboard');

Route::get('/class', [ClassGroupController::class, 'index']);

//Test-Albert:
Route::get('/test', function(){
    //return 'Hello World';
    //return ['foo' => 'bar'];
    //return view('test');
    $name = request('name');
    return $name;
});

Route::get('/homepage', function(){
    return view('homepage');
});

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/information', function(){
    return view('information');
});

Route::get('/grupos', function(){
    return view('group/group-management');
});

Route::get('/grupos/1', function(){
    return view('group/group-edit');
});


Route::get('/mascota',[PetController::class, 'index']);

