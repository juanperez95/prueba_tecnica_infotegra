<?php

use App\Http\Controllers\PersonajeController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::controller(PersonajeController::class)->group(function(){
    // Ruta para llamar los datos de la API
    Route::get('/','getPersonajes')->name('getPersonajes');
    Route::get('/editar/{id}','editar_personaje')->name('editarPersonaje');
    // Guardar los cambios en la base de datos
    Route::post('/editar_personaje/{id}','guardar_edicion')->name('guardarEdicion');
    // Ruta para eliminar todo de la base de datos , volver al consumo de la API
    Route::get('limpiar_datos/','limpiar_datos')->name('limpiarDatos');
});
