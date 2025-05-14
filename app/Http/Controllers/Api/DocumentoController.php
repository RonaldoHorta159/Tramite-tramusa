<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        return response()->json(Documento::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_tipo_documento' => 'required|exists:tipo_documento,id_tipo_documento',
            'nro_documento' => 'required|string|max:50',
            'id_tipo_tramite' => 'required|exists:tipo_tramite,id_tipo_tramite',
            'id_estado' => 'required|exists:estado_documento,id_estado',
            'id_medio_envio' => 'required|exists:medio_envio,id_medio',
            'id_origen_oficina' => 'required|exists:oficina,id_oficina',
            'id_origen_parte' => 'required|exists:parte,id_parte',
            'id_origen_parte'    => 'required|exists:parte,id_parte',
        'usuario_creo'       => 'required|exists:man_usuario,id_usuario',
        // otros campos opcionales…
        ]);

        // Genera el UUID y fecha_registro se pone por default
        $data['codigo_uuid'] = (string) \Illuminate\Support\Str::uuid();

        $documento = Documento::create($data);

        return response()->json($documento, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Documento $documento)
    {
         // Cargar relaciones si las necesitas
        // $documento->load(['tipoDocumento','estado','origenOficina','origenParte']);
        return response()->json($documento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documento $documento)
    {
        $data = $request->validate([
            // Declara sólo los campos que quieras permitir actualizar
            'nro_documento'      => 'sometimes|string|max:50',
            'nro_folios'         => 'sometimes|integer|min:1',
            'asunto'             => 'sometimes|string|max:500',
            'id_tipo_documento'  => 'sometimes|exists:tipo_documento,id_tipo_documento',
            'id_tipo_tramite'    => 'sometimes|exists:tipo_tramite,id_tipo_tramite',
            'id_estado'          => 'sometimes|exists:estado_documento,id_estado',
            'id_medio_envio'     => 'sometimes|exists:medio_envio,id_medio',
            'id_origen_oficina'  => 'sometimes|exists:oficina,id_oficina',
            'id_origen_parte'    => 'sometimes|exists:parte,id_parte',
            'usuario_creo'       => 'sometimes|exists:man_usuario,id_usuario',
            // si permites cambiar destino:
            'id_destino_oficina' => 'sometimes|nullable|exists:oficina,id_oficina',
            'id_destino_parte'   => 'sometimes|nullable|exists:parte,id_parte',
        ]);

        $documento->update($data);

        return response()->json($documento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documento $documento)
    {
        $documento->delete();
        // 204 No Content
        return response()->noContent();
    }
}
