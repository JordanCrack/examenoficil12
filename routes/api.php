<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtraccionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Validation\ValidationException;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/comentarios', [ComentarioController::class, 'store'])->middleware('auth:sanctum');
    Route::get('/comentarios/entre/{min}/{max}', [ComentarioController::class, 'comentariosEntreValores'])->middleware('auth:sanctum');
    Route::get('/atracciones/{id}/comentarios/cantidad', [ComentarioController::class, 'cantidadComentariosAtraccion'])->middleware('auth:sanctum');
    
    Route::get('/especies', [EspecieController::class, 'index'])->middleware('auth:sanctum');
    Route::get('/especies/{id}/atracciones', [EspecieController::class, 'atraccionesPorEspecie'])->middleware('auth:sanctum');
    Route::get('/especies/{id}/calificacion_promedio', [EspecieController::class, 'calificacionPromedioPorEspecie'])->middleware('auth:sanctum');
    
    Route::put('/atracciones/{id}', [AtraccionController::class, 'update'])->middleware('auth:sanctum');
 

});
