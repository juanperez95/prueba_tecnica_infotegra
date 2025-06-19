<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personajes', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->enum('status', ['Alive','Dead','unknown']); // Status se declara tipo enum para solo esos estados
            $table->string('species',50);
            $table->string('image'); // Almacenar la ruta de la imagen
            $table->string('type',50)->nullable(); // Puede quedar en blanco el campo
            $table->enum('gender',['Male','Female','unknown','Genderless']); // Genero del personaje
            // Datos del origen
            $table->string('origin_name',70);
            $table->string('origin_url'); // URL del origen o localizacion
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personajes');
    }
};
