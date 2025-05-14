<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Desactiva FKs para permitir el truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('tipo_documento')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2) Lista completa sin duplicados
        $tipos = [
            'ANEXO',
            'ACTA',
            'CARTA',
            'CARTA CIRCULAR',
            'CARTA MÚLTIPLE',
            'CARTA NOTARIAL',
            'CIRCULAR',
            'CONTRATO',
            'CONVENIO',
            'DECLARACIÓN JURADA',
            'DICTAMEN',
            'EXPEDIENTE',
            'INFORME',
            'INFORME CIRCULAR',
            'INFORME MULTIPLE',
            'INVITACION',
            'MEMO MÚLTIPLE',
            'MEMORANDUM',
            'MEMORANDUM CIRCULAR',
            'MEMORIAL',
            'NOTIFICACIÓN',
            'OFICIO',
            'OFICIO CIRCULAR',
            'OFICIO MÚLTIPLE',
            'REQUERIMIENTO',
            'RESOLUCION',
            'SOLICITUD',
            'ORDEN DE COMPRA',
            'ORDEN DE SERVICIO',
            'CERTIFICACIÓN PRESUPUESTAL',
            'REGISTRO CONTABLE DE PROVISIONES',
            'REGISTRO CONTABLE DE COMPRAS',
            'REGISTRO CONTABLE DE VENTAS',
            'REGISTRO CONTABLE DE HONORARIOS',
            'REGISTRO CONTABLE DE PLANILLA',
            'RENDICION',
        ];

        foreach ($tipos as $descripcion) {
            DB::table('tipo_documento')->insert([
                'descripcion' => $descripcion,
                'abreviatura' => null,
                'estado' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
