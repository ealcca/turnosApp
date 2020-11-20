<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainpageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TurnController;

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

Route::get('/',[MainpageController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('clients',ClientController::class); 
    Route::resource('turns',TurnController::class);
});