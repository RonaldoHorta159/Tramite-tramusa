<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManUsuario extends Model
{
    // 1) Indicamos la tabla si no sigue la convención 'man_usuarios'
    protected $table = 'man_usuario';

    // 2) Clave primaria custom
    protected $primaryKey = 'id_usuario';

    // 3) Laravel por defecto usa 'id' y columnas created_at/updated_at.
    //    Aquí no queremos timestamps automáticos:
    public $timestamps = false;

    // 4) Indica los campos que podemos rellenar en mass-assignment.
    protected $fillable = [
        'dni',
        'clave',
        'activo',
        'estado',
    ];

    // 5) (Opcional) Si quisiéramos customizar nombres de timestamps:
    // const CREATED_AT = 'ins';
    // const UPDATED_AT = 'upd';
}
