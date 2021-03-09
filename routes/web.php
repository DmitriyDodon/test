<?php

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
//for auth

Route::middleware('auth')->group(function(){
    Route::get('/delete/{ad}' , [\App\Http\Controllers\AdController::class , 'delete']);
    Route::get('/edit/{ad}' , [\App\Http\Controllers\AdController::class , 'editAd']);
    Route::post('/edit/{ad}' , [\App\Http\Controllers\AdController::class , 'update']);
    Route::get('/edit' , [\App\Http\Controllers\AdController::class , 'editAd']);
    Route::post('/edit' , [\App\Http\Controllers\AdController::class , 'store']);
    Route::get('/logout' , [\App\Http\Controllers\UserController::class , 'logout']);
});

//for guest

Route::middleware('guest')->group(function(){
    Route::post('/' , [\App\Http\Controllers\UserController::class , 'authUser']);
});


Route::get('/' , [\App\Http\Controllers\AdController::class , 'showAll'])->name('login');
Route::get('/{ad}' , [\App\Http\Controllers\AdController::class , 'showAd']);



