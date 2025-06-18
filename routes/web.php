<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api',function(){
    $numero_registros = [];
    // Llenar el arreglo con 100 datos
    for($i=0; $i < 2; $i++){
        $numero_registros[] = $i+1;
    } 
    $data_api = Http::get('https://rickandmortyapi.com/api/character/'.json_encode($numero_registros));
    // Validar que la peticion sea exitosa
    return view('api_view',compact('data_api'));
});
