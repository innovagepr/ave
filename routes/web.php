<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ApiController;
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

//Not a direct route, modal in homepage
Route::get('/contact', function(){
    return view('contact');
});

Route::get('/information', function(){
    return view('information');
});

Route::get('/grupos', function(){
    return view('group/groups');
});

Route::get('/grupos/1', function(){
    return view('group/group-edit');
});

Route::get('/lectura', function(){
    return view('Activity/activity2');
});
Route::get('/emtest', function(){
    return view('emtest');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/manejoActividades', function () {
    return view('Activity/activities');
})->name('actividades');

Route::get('/manejoActividades/palabras', function(){
    return view('Activity/word-activity-edit');
});


Route::get('/manejoActividades/lectura', function(){
    return view('Activity/reading-activity-edit');
});

Route::get('/estadisticas', function(){
    return view('profile/statistics');
});

Route::get('/mascota',[PetController::class, 'index']);

Route::get('/actividades', function () {
    return view('livewire.activities');
})->name('activities');

Route::get('/lista/{list}', [ActivityController::class, 'show']);

//Text-to-Speech
Route::get('/guz', [ApiController::class,'tts']);
