<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtraccionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\EspecieController;


Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::get('/atracciones', [AtraccionController::class, 'index'])->name('atracciones.index');
});
