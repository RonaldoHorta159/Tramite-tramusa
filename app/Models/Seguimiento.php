<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = 'seguimiento';
    protected $primaryKey = 'id_seguimiento';

    public $timestamps = false;
    const CREATED_AT = 'creado_en';

    protected $fillable = [
        'id_documento',
        'fecha_envio',
        'id_oficina_origen',
        'id_parte_origen',
        'id_oficina_destino',
        'id_parte_destino',
        'observaciones',
        'usuario_envio',
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'id_documento');
    }

    public function detalles()
    {
        return $this->hasMany(SeguimientoDetalle::class, 'id_seguimiento');
    }
}
