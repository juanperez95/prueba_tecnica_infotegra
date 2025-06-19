<?php

use App\Http\Controllers\PersonajeController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::controller(PersonajeController::class)->group(function(){
    // Ruta para llamar los datos de la API
    Route::get('/','getPersonajes')->name('getPersonajes');
});
