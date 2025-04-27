<?php

namespace App\Http\Controllers\Api;

use App\Models\Vacacione;
use Illuminate\Http\Request;
use App\Http\Requests\VacacioneRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\VacacioneResource;

class VacacioneController extends Controller
{

    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request)
    {
        $vacaciones = Vacacione::paginate(20);

        return response()->json([
            'registros'  => VacacioneResource::collection($vacaciones)->resolve(),
            'enlaces' => [
                'primero' => $vacaciones->url(1),
                'ultimo'  => $vacaciones->url($vacaciones->lastPage()),
                'anterior'  => $vacaciones->previousPageUrl(),
                'siguiente'  => $vacaciones->nextPageUrl(),
            ],
        ], 200);
    }

    /**
     * Guarda un nuevo recurso.
     */
    public function store(VacacioneRequest $request): JsonResponse
    {
        $vacacione = Vacacione::create($request->validated());

        return response()->json(new VacacioneResource($vacacione));
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(Vacacione $vacacione): JsonResponse
    {
        return response()->json(new VacacioneResource($vacacione));
    }

    /**
     * Actualiza el recurso especificado.
     */
    public function update(VacacioneRequest $request, Vacacione $vacacione): JsonResponse
    {
        $vacacione->update($request->validated());

        return response()->json(new VacacioneResource($vacacione));
    }

    /**
     * Elimina el recurso especificado.
     */
    public function destroy(Vacacione $vacacione): JsonResponse
    {
        $vacacione->delete();

        return response()->json([
            'mensaje' => 'Las vacaciones fueron eliminadas correctamente.',
        ], 200);
    }

}
