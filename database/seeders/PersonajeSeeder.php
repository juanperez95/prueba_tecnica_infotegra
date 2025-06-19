<?php

namespace Database\Seeders;

use App\Models\Personaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear por defecto un personaje para realizar pruebas a nivel de base de datos
        Personaje::create([
            'name' => 'Rick Sanchez',
            'status' => 'Alive',
            'species' => 'Human',
            'image' => 'https://rickandmortyapi.com/api/character/avatar/1.jpeg',
            'type' => 'Human',
            'gender' => 'Male',
            'origin_name' => 'Earth',
            'origin_url' => 'https://rickandmortyapi.com/api/location/1',
        ])->save();

        // Crear por defecto un personaje para realizar pruebas a nivel de base de datos
        Personaje::create([
            'name' => 'Morty Smith',
            'status' => 'Alive',
            'species' => 'Human',
            'image' => 'https://rickandmortyapi.com/api/character/avatar/2.jpeg',
            'type' => 'Human',
            'gender' => 'Male',
            'origin_name' => 'Earth',
            'origin_url' => 'https://rickandmortyapi.com/api/location/1',
        ])->save();
    }
}
