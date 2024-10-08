<?php

use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clientes',[UsuariosController::class, 'lista']); //lista todos los clientes
Route::get('/clientes/{id}',[UsuariosController::class, 'cliente']); //obtiene un cliente
Route::post('/clientes',[UsuariosController::class, 'crear']); //creando un cliente
Route::put('/clientes/{id}',[UsuariosController::class, 'actualizar']); //actualiza un cliente
Route::delete('/clientes/{id}',[UsuariosController::class,  'eliminar']); //elimina un cliente