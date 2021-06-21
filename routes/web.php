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


Auth::routes();

Route::get('/', function () {
    return view('home');
})->middleware('auth');;

Route::get('/database', [\App\Http\Controllers\DatabaseController::class, 'index'])->name('dba');

Route::get('/recensement', [\App\Http\Controllers\RecensementController::class, 'index'])->middleware('auth');

Route::get('/database/{id}/delete', [\App\Http\Controllers\DatabaseController::class, 'delete']);

Route::get('/modifier/{id}/', [\App\Http\Controllers\ModifierRecensementController::class, 'index']);
