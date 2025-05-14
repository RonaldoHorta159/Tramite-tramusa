<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seguimiento;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $documentoId)
    {
        $data = $request->validate([
            'id_oficina_destino' => 'nullable|exists:oficina,id_oficina',
            'id_parte_destino' => 'nullable|exists:parte,id_parte',
            'observaciones' => 'nullable|string',
            'usuario_envio' => 'required|exists:man_usuario,id_usuario',
        ]);

        $data['id_documento'] = $documentoId;

        $seguimiento = Seguimiento::create($data);

        return response()->json($seguimiento, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(Seguimiento $seguimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seguimiento $seguimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seguimiento $seguimiento)
    {
        //
    }
}
