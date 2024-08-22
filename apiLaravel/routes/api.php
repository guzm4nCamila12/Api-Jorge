<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactosController;

Route::get('/user', [contactosController::class, 'index']);

Route::get('/usuarios', function (Request $request) {
    return "Bienvenidos a mi API REST en LARAVEL 11";
});

Route::get('/usuarios/{id}', function (Request $request) {
    return "Consultando un solo usario";
});

Route::post('/usuarios', function (Request $request) {
    return "Creando usuarios";
});

Route::put('/usuarios/{id}', function (Request $request) {
    return "Actualizando usuarios";
});

Route::delete('/usuarios/{id}', function (Request $request) {
    return "Borrando usuarios";
});