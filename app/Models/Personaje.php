<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'status',
        'species',
        'image',
        'type',
        'gender',
        'origin_name',
        'origin_url',
    ];

    // Esconder atributos de fechas
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
