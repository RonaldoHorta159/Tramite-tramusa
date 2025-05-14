<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedioEnvio extends Model
{
    protected $table = 'medio_envio';
    protected $primaryKey = 'id_medio';

    // Sólo timestamp personalizado creado_en, no updated_at
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];
}