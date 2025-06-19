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
        if(Personaje::count() == 0){
            // Obtener los 100 registros
            $numero_registros = [];
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

    // Mostrar vista para editar personajes
    public function editar_personaje($id){
        $personaje = Personaje::find($id);
        return view('api_view',['personaje'=>$personaje]);
    }

    // Funcion para efectuar los cambios en la base de datos
    public function guardar_edicion(Request $request,$id){
        // Obtener los datos del formulario
        $nombre = $request->name;
        $estado = $request->status;
        $especie = $request->species;
        $genero = $request->gender;
        $tipo = $request->type;
        $origen = $request->origin_name;

        // Buscar el personaje por el ID
        $personaje = Personaje::find($id);
        error_log(json_encode($personaje));
        $personaje->name = $nombre;
        $personaje->status = $estado != '' ? $estado : $personaje->status; // Evitar que se actualicen los campos en blanco
        $personaje->species = $especie;
        $personaje->gender = $genero != '' ? $genero : $personaje->gender;
        $personaje->type = $tipo;
        $personaje->origin_name = $origen;

        // Guardar los cambios en base de datos y redirigir a la vista
        $personaje->save();
        return redirect()->route('getPersonajes');


    }
}
