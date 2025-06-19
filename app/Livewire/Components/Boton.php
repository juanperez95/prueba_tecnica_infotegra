<?php

namespace App\Livewire\Components;

use App\Models\Personaje;
use Livewire\Component;

class Boton extends Component
{
    public $data_api = []; // Propiedad para recibir los datos y registrarlo para funcion del boton
    public function mount($data)
    {
        $this->data_api = $data;
    }

    // Funcion para guardar los registros en la base de datos

    public function guardar_registros(){
        foreach($this->data_api as $personaje){
            Personaje::create(
                ['name' => $personaje['name'],
                'status' => $personaje['status'],
                'species' => $personaje['species'],
                'image' => $personaje['image'],
                'type' => $personaje['type'],
                'gender' => $personaje['gender'],
                'origin_name' => $personaje['origin']['name'],
                'origin_url' => $personaje['origin']['url']]
            )->save();
        }
        $this->js('alert("Registro completo")');
        $this->data_api = false;
        return redirect()->route('getPersonajes');
    }

    // boton para guardar los registros en la base de datos
    public function render()
    {
        return <<<'HTML'
        <div>
            {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
            <section>
                <article>
                    <button wire:click="guardar_registros" type="button" class="p-3 mt-3 text-white bg-green-600 duration-150 transition-ease-in-out rounded-md hover:bg-green-800 disabled:bg-green-300" @disabled(!$data_api)>Guardar registro en base de datos</button>
                </article>
            </section>
        </div>
        HTML;
    }
}
