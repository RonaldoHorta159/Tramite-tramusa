<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoDocumento extends Model
{
    protected $table = 'estado_documento';
    protected $primaryKey = 'id_estado';

    // Sólo created_at, no updated_at
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
