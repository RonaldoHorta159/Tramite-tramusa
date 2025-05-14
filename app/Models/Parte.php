<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parte extends Model
{
    protected $table = 'parte';
    protected $primaryKey = 'id_parte';
    public $timestamps = false;

    protected $fillable = [
        'tipo',      // 'INTERNA' o 'EXTERNA'
        'dni_ruc',
        'nombre',
        'celular',
        'correo',
        'activo',
    ];
}
