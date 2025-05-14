<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTramite extends Model
{
    protected $table = 'tipo_tramite';
    protected $primaryKey = 'id_tipo_tramite';
    public $timestamps = true;

    protected $fillable = [
        'descripcion',
        'estado',
    ];
}
