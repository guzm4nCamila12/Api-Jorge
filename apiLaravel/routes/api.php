<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactosController;

Route::get('/user', [contactosController::class, 'index']);

Route::post('/user', [contactosController::class,'store']);

Route::get('/usuarios/{id}', [contactosController::class,'show']);

Route::delete('/usuarios/{id}', [contactosController::class, 'eliminar']);

Route::put('/usuarios/{id}', [contactosController::class, 'actualizar']);

Route::patch('/usuarios/{id}', [contactosController::class, 'actualizarCampo']);

Route::get('/usuarios', function (Request $request) {
    return "Bienvenidos a mi API REST en LARAVEL 11";
});