<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\RewardController;
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
//Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('homepage');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('livewire.dashboard');
})->name('dashboard');

Route::get('/class', [ClassGroupController::class, 'index']);

//Test-Albert:
Route::get('/test', function(){
    $name = request('name');
    return $name;
});

Route::get('/register/provisional', function(){
    return view('auth.register-provisional');
})->name('register-provisional');

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

Route::middleware(['auth:sanctum', 'verified'])->get('/grupos', function(){
    return view('group/groups');
})->name('grupos');


Route::get('/lectura/{list}', [ReadingController::class, 'show']);

Route::middleware(['auth:sanctum', 'verified'])->get('/manejoActividades', function () {
    return view('Activity/activities');
})->name('actividades');

Route::middleware(['auth:sanctum', 'verified'])->get('/manejoActividades/palabras', function(){
    return view('Activity/word-activity-edit');
})->name('manejoPalabras');


Route::middleware(['auth:sanctum', 'verified'])->get('/manejoActividades/lectura', function(){
    return view('Activity/reading-activity-edit');
})->name('manejoLectura');

Route::middleware(['auth:sanctum', 'verified'])->get('/estadisticas', function(){
    return view('profile/statistics');
})->name('estadisticas');

Route::get('/mascota',[PetController::class, 'index'])->name('mascota');;

Route::get('/actividades', function () {
    return view('act');
//    return view('livewire.activities');
})->name('activities');

Route::get('/lista/{list}', [ActivityController::class, 'show']);

Route::get('/editarPerfil', function (){
    return view('profile-settings');
});

Route::get('/tienda',[RewardController::class, 'index'])->name('tienda');;

Route::get('/seleccionar-mascota',[PetController::class, 'select']);
