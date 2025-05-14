<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documento';
    protected $primaryKey = 'id_documento';

    // Usamos timestamps personalizados
    public $timestamps = false;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    protected $fillable = [
        'codigo_uuid',
        'nro_libro',
        'fecha_registro',
        'id_tipo_documento',
        'nro_documento',
        'nro_folios',
        'asunto',
        'id_tipo_tramite',
        'id_estado',
        'id_medio_envio',
        'id_origen_oficina',
        'id_origen_parte',
        'id_destino_oficina',
        'id_destino_parte',
        'archivo_ruta',
        'usuario_creo',
    ];

    // Relaciones
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_documento');
    }

    public function tipoTramite()
    {
        return $this->belongsTo(TipoTramite::class, 'id_tipo_tramite');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoDocumento::class, 'id_estado');
    }

    public function medioEnvio()
    {
        return $this->belongsTo(MedioEnvio::class, 'id_medio_envio');
    }

    public function origenOficina()
    {
        return $this->belongsTo(Oficina::class, 'id_origen_oficina');
    }

    public function destinoOficina()
    {
        return $this->belongsTo(Oficina::class, 'id_destino_oficina');
    }

    public function origenParte()
    {
        return $this->belongsTo(Parte::class, 'id_origen_parte');
    }

    public function destinoParte()
    {
        return $this->belongsTo(Parte::class, 'id_destino_parte');
    }

    public function usuarioCreador()
    {
        return $this->belongsTo(ManUsuario::class, 'usuario_creo');
    }

    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class, 'id_documento');
    }
}
