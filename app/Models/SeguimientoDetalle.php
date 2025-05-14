<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeguimientoDetalle extends Model
{
    protected $table = 'seguimiento_detalle';
    protected $primaryKey = 'id_detalle';

    public $timestamps = false;
    const CREATED_AT = 'creado_en';

    protected $fillable = [
        'id_seguimiento',
        'fecha_accion',
        'accion',
        'observaciones',
        'usuario_accion',
    ];

    public function seguimiento()
    {
        return $this->belongsTo(Seguimiento::class, 'id_seguimiento');
    }

    public function usuarioAccion()
    {
        return $this->belongsTo(ManUsuario::class, 'usuario_accion');
    }
}
