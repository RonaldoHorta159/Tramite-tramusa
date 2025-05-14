<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    // Tabla custom
    protected $table = 'tipo_documento';

    // Clave primaria distinta de "id"
    protected $primaryKey = 'id_tipo_documento';

    // Usamos timestamps (created_at/updated_at) ya que migración definió ambos
    public $timestamps = true;

    // Campos rellenables
    protected $fillable = [
        'descripcion',
        'abreviatura',
        'estado',
    ];
}
