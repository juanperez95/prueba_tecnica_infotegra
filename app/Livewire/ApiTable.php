<?php

namespace App\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;


final class ApiTable extends PowerGridComponent
{
    public string $tableName = 'api-table-9myxn6-table';

    public bool $deferLoading = true;

    public function datasource(): Collection
    {
        // Consultar la consulta de la API
        $numero_registros = [];
        for($i=0; $i < 100; $i++){
            $numero_registros[] = $i+1; // Llenar el array con los 100 registros
        }
        $data_api = Http::get('https://rickandmortyapi.com/api/character/'.json_encode($numero_registros));
        return collect($data_api->json()); // Devolver la coleccion json para iterar los elementos de la api
    }

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage(7) // Ajustar el contenido mostrado por pagina de la tabla
                ->showRecordCount(),

            // Mostrar detalles 
            PowerGrid::detail()
                ->view('livewire.detalle') // vista en la que se renderiza los detalles
                ->showCollapseIcon()
                ->params([
                    'id'=>'id',
                ]),

        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields() // Mostrar los campos de la tabla con los datos de la API
            ->add('id')
            ->add('image',fn($personaje) => "<img src='{$personaje->image}' alt='Personaje' class='w-15 h-15 rounded-full imagenes' />")
            ->add('name')
            ->add('status')
            ->add('species');
    }

    public function columns(): array
    {
        // Construir las columnas
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),

            Column::make('Personaje', 'image'),

            Column::make('Nombre', 'name')
                ->searchable()
                ->sortable(),

            Column::make('Estado', 'status'),

            Column::make('Especie', 'species')
                ->sortable(),

            Column::action(title: 'Acciones')
        ];
    }

    public function actions($row): array
    {
        // Mostrar boton para ver detalles, en base la la vista 'detalle.blade'
        return [
            Button::add('detail')
                ->slot('Detalles')
                ->class('bg-green-500 duration-150 transition-ease-in-out hover:bg-green-700 text-white font-bold py-2 px-4 rounded')
                ->toggleDetail($row->id)
        ];
    }

}
