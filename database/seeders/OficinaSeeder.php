<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OficinaSeeder extends Seeder
{
    /**
     * Poblamos la tabla `oficina` con los departamentos existentes.
     */
    public function run(): void
    {
        $oficinas = [
            'SERVICIOS TURISTICOS',
            'ADMINISTRACION',
            'SECRETARIA GENERAL',
            'TECNOLOGIAS DE INFORMACION',
            'DEPARTAMENTO DE ALMACEN',
            'CULTURA Y DEPORTE',
            'OFICINA MACHUPICCHU',
            'GUARDIANIA',
            'DEPARTAMENTO DE PATRIMONIO',
            'RELACIONES PUBLICAS Y MARKETING',
            'ENLACE INTERINSTITUCIONAL',
            'MANTENIMIENTO',
            'DIRECTORIO',
            'DEPARTAMENTO DE PSICOLOGIA',
            'PROCEDIMIENTO ADMINISTRATIVO DISCIPLINARIO',
            'COMITE DE SEGURIDAD Y SALUD',
        ];

        foreach ($oficinas as $nombre) {
            DB::table('oficina')->updateOrInsert(
                ['nombre' => $nombre],
                [
                    'abreviatura'   => null,
                    'oficina_padre' => null,
                    'activo'        => 'S',
                    'creado_en'     => now(),
                ]
            );
        }
    }
}