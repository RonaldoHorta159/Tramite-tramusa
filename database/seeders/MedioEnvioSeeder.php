<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedioEnvioSeeder extends Seeder
{
    public function run(): void
    {
        $medios = [
            'FÍSICO',
            'DIGITAL',
            'CORREO',
        ];

        foreach ($medios as $nombre) {
            if (!DB::table('medio_envio')->where('nombre', $nombre)->exists()) {
                DB::table('medio_envio')->insert([
                    'nombre' => $nombre,
                    'creado_en' => now(),
                ]);
            }
        }
    }
}
