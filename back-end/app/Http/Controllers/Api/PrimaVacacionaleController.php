<?php

namespace App\Http\Controllers\Api;

use App\Models\PrimaVacacionale;
use Illuminate\Http\Request;
use App\Http\Requests\PrimaVacacionaleRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PrimaVacacionaleResource;

class PrimaVacacionaleController extends Controller
{

    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request)
    {
        $primaVacacionales = PrimaVacacionale::paginate(20);

        return response()->json([
            'registros'  => PrimaVacacionaleResource::collection($primaVacacionales)->resolve(),
            'enlaces' => [
                'primero' => $primaVacacionales->url(1),
                'ultimo'  => $primaVacacionales->url($primaVacacionales->lastPage()),
                'anterior'  => $primaVacacionales->previousPageUrl(),
                'siguiente'  => $primaVacacionales->nextPageUrl(),
            ],
        ], 200);
    }

    /**
     * Guarda un nuevo recurso en almacenamiento.
     */
    public function store(PrimaVacacionaleRequest $request): JsonResponse
    {
        $primaVacacionale = PrimaVacacionale::create($request->validated());

        return response()->json(new PrimaVacacionaleResource($primaVacacionale));
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(PrimaVacacionale $primaVacacionale): JsonResponse
    {
        return response()->json(new PrimaVacacionaleResource($primaVacacionale));
    }

    /**
     * Actualiza el recurso especificado en almacenamiento.
     */
    public function update(PrimaVacacionaleRequest $request, PrimaVacacionale $primaVacacionale): JsonResponse
    {
        $primaVacacionale->update($request->validated());

        return response()->json(new PrimaVacacionaleResource($primaVacacionale));
    }

    /**
     * Elimina el recurso especificado de almacenamiento.
     */
    public function destroy(PrimaVacacionale $primaVacacionale): Response
    {
        $primaVacacionale->delete();

        return response()->json([
            'mensaje' => 'La prima vacacional ha sido eliminado correctamente.',
        ], 200);
    }
    
}
