<?php

namespace App\Http\Controllers\Api;

use App\Models\Plaza;
use Illuminate\Http\Request;
use App\Http\Requests\PlazaRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlazaResource;

class PlazaController extends Controller
{
    
    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request)
    {
        $plazas = Plaza::paginate(20);

        return response()->json([
            'registros'  => PlazaResource::collection($plazas)->resolve(),
            'enlaces' => [
                'primero' => $plazas->url(1),
                'ultimo'  => $plazas->url($plazas->lastPage()),
                'anterior'  => $plazas->previousPageUrl(),
                'siguiente'  => $plazas->nextPageUrl(),
            ],
        ], 200);
    }

    /**
     * Guarda un nuevo recurso en el almacenamiento.
     */
    public function store(PlazaRequest $request): JsonResponse
    {
        $plaza = Plaza::create($request->validated());

        return response()->json(new PlazaResource($plaza));
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(Plaza $plaza): JsonResponse
    {
        return response()->json(new PlazaResource($plaza));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(PlazaRequest $request, Plaza $plaza): JsonResponse
    {
        $plaza->update($request->validated());

        return response()->json(new PlazaResource($plaza));
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Plaza $plaza): Response
    {
        $plaza->delete();

        return response()->json([
            'mensaje' => 'Plaza eliminada correctamente.',
        ], 200);
    }

}
