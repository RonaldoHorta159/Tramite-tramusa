<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoDocumentoSeeder extends Seeder
{
    public function run(): void
    {
        $estados = [
            'CREADO',
            'DERIVADO',
            'PENDIENTE',
            'RECIBIDO',
            'RESPONDIDO',
            'ARCHIVADO',
        ];

        foreach ($estados as $nombre) {
            if (!DB::table('estado_documento')->where('nombre', $nombre)->exists()) {
                DB::table('estado_documento')->insert([
                    'nombre' => $nombre,
                    'descripcion' => null,
                    'created_at' => now(),
                ]);
            }
        }
    }
}