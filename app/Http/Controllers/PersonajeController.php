<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PersonajeController extends Controller
{
    // Funcion para consultar los datos de la API
    public function getPersonajes(Request $request){
        // Validar si primero la base de datos si hay registros para no realizar peticiones a la API
        if(Personaje::count() <= 0){
            // Obtener los 100 registros
            $numero_registro = [];
            for($i=0; $i < 100; $i++){
                $numero_registros[] = $i+1; // Llenar el array con los 100 registros
            }
            // Obtener los datos de la API
            $data_api = Http::get('https://rickandmortyapi.com/api/character/'.json_encode($numero_registros));
    
            // Validar si la peticion es validay devolver la respuesta json 
            if($data_api->status() == 200){
                return view('welcome',['data_api'=>$data_api->json()]);
            }
            return view('welcome');
        }
        // De lo contrario busca en base de datos
        return view('welcome',['data_api'=>false]);
    }
}
