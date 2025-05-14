<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioOficina extends Model
{
    protected $table = 'usuario_oficina';
    protected $primaryKey = 'id_usuario_oficina';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'id_oficina',
        'activo',
        'estado',
    ];

    // UsuarioOficina → ManUsuario
    public function usuario()
    {
        return $this->belongsTo(ManUsuario::class, 'id_usuario');
    }

    // UsuarioOficina → Oficina
    public function oficina()
    {
        return $this->belongsTo(Oficina::class, 'id_oficina');
    }
}
