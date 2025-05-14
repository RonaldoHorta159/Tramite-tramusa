<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoTramiteSeeder extends Seeder
{
    public function run(): void
    {
        $trámites = [
            'EMITIR',
            'RECIBIR',
            // añade aquí todos los tipos de trámite de tu sistema…
        ];

        foreach ($trámites as $desc) {
            if (!DB::table('tipo_tramite')->where('descripcion', $desc)->exists()) {
                DB::table('tipo_tramite')->insert([
                    'descripcion' => $desc,
                    'estado' => 'A',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}