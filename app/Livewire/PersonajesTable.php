<?php

namespace App\Livewire;

use App\Models\Personaje;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;


final class PersonajesTable extends PowerGridComponent 
{
    public string $tableName = 'personajes-table-k9aivi-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
            PowerGrid::detail()
                ->view('livewire.detalle')
                ->showCollapseIcon()
                ->params([
                    'id'=>'id',
                ])];
    }

    public function datasource()
    {
        // Construir la tabla con los datos de la base de datos
        return Personaje::query(); 


    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        // Definir las variables que llegan de la base de datos , 'el nombre de las columnas de base de datos'
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('status')
            ->add('species')
            ->add('image', fn ($personaje) => "<img src='{$personaje->image}' alt='Personaje' class='w-15 h-15 rounded-full' />");
    }

    public function columns(): array
    {
        return [
            Column::make('ID','id')->sortable()->searchable(),
            // Crear y definir las columnas de la tabla
            Column::make('Personaje', 'image')
                ->sortable()
                ->bodyAttribute('class','w-15 h-15 rounded-full')
                ->searchable(),

            Column::make('Nombre', 'name')
                ->sortable()
                ->bodyAttribute('class','w-15 h-15 rounded-full')
                ->searchable(),

            Column::make('Estado', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Especie', 'species')
                ->sortable()
                ->searchable(),

            Column::action('Acciones')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    // Funcion para editar 
    public function edit($rowId)
    {
        return redirect()->route('editarPersonaje',['id'=>$rowId]);
    }

    public function actions($row): array
    {
        return [
            // Boton para editar
            Button::add('edit')
                ->slot('Editar')
                ->id('edit-'.$row->id)
                ->class('bg-slate-500 duration-150 transition-ease-in-out hover:bg-slate-700 text-white font-bold py-2 px-4 rounded')
                ->dispatch('edit', ['rowId' => $row->id]),

            // Boton de detalles de personaje
            Button::add('detail')
                ->slot('Detalles')
                ->class('bg-green-500 duration-150 transition-ease-in-out hover:bg-green-700 text-white font-bold py-2 px-4 rounded')
                ->toggleDetail($row->id)
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->
        ];
    }
    */
}
