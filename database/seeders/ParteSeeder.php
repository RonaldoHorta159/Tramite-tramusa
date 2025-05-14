<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParteSeeder extends Seeder
{
    /**
     * Poblamos la tabla `parte` con los tipos INTERNA y EXTERNA.
     */
    public function run(): void
    {
        $partes = [
            ['INTERNA', 'Unidad Administrativa'],
            ['EXTERNA', 'Ciudadano / Usuario'],
        ];

        foreach ($partes as [$tipo, $nombre]) {
            DB::table('parte')->updateOrInsert(
                ['tipo' => $tipo, 'nombre' => $nombre],
                [
                    'dni_ruc'       => null,
                    'celular'       => null,
                    'correo'        => null,
                    'activo'        => 'S',
                    'creado_en'     => now(),
                ]
            );
        }
    }
}