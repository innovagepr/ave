<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ProSummary;
use GuzzleHttp\Client;

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
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
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

Route::get('/mascota',[PetController::class, 'index']);

Route::get('/actividad1', [ActivityController::class, 'show']);

Route::get('/dashboard',[ProSummary::class, 'render']);

//Route::post("")
Route::get('/json-api', function() {
    $client = new Client();

    $response = $client->request('GET', 'https://desertebs.com/api/dummy/posts');
    $statusCode = $response->getStatusCode();
    $body = $response->getBody()->getContents();

    return $body;
});

Route::get('json-api', 'ApiController@index');
