<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table = 'oficina';
    protected $primaryKey = 'id_oficina';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'abreviatura',
        'oficina_padre',
        'activo',
    ];

    // Relación self-reference: oficina hija → oficina padre
    public function parent()
    {
        return $this->belongsTo(Oficina::class, 'oficina_padre');
    }

    // Oficina padre → sus sub-oficinas
    public function children()
    {
        return $this->hasMany(Oficina::class, 'oficina_padre');
    }
}
