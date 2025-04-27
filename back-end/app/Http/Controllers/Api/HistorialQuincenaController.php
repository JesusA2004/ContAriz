<?php

namespace App\Http\Controllers\Api;

use App\Models\HistorialQuincena;
use Illuminate\Http\Request;
use App\Http\Requests\HistorialQuincenaRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\HistorialQuincenaResource;

class HistorialQuincenaController extends Controller
{

    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request)
    {
        $historialQuincenas = HistorialQuincena::paginate(20);

        return response()->json([
            'registros'  => HistorialQuincenaResource::collection($historialQuincenas)->resolve(),
            'enlaces' => [
                'primero' => $historialQuincenas->url(1),
                'ultimo'  => $historialQuincenas->url($historialQuincenas->lastPage()),
                'anterior'  => $historialQuincenas->previousPageUrl(),
                'siguiente'  => $historialQuincenas->nextPageUrl(),
            ],
        ], 200);
    }

    /**
     * Guarda un nuevo recurso en el almacenamiento.
     */
    public function store(HistorialQuincenaRequest $request): JsonResponse
    {
        $historialQuincena = HistorialQuincena::create($request->validated());

        return response()->json(new HistorialQuincenaResource($historialQuincena));
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(HistorialQuincena $historialQuincena): JsonResponse
    {
        return response()->json(new HistorialQuincenaResource($historialQuincena));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(HistorialQuincenaRequest $request, HistorialQuincena $historialQuincena): JsonResponse
    {
        $historialQuincena->update($request->validated());

        return response()->json(new HistorialQuincenaResource($historialQuincena));
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(HistorialQuincena $historialQuincena): JsonResponse
    {
        $historialQuincena->delete();

        return response()->json([
            'mensaje' => 'Historial de quincena eliminado correctamente.',
        ],200); // 🔥 Código 200 OK

    }
    
}
