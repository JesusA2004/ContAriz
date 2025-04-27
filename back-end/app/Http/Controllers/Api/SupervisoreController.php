<?php

namespace App\Http\Controllers\Api;

use App\Models\Supervisore;
use Illuminate\Http\Request;
use App\Http\Requests\SupervisoreRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupervisoreResource;

class SupervisoreController extends Controller
{

    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request)
    {
        $supervisores = Supervisore::paginate(20);

        return response()->json([
            'registros'  => SupervisoreResource::collection($supervisores)->resolve(),
            'enlaces' => [
                'primero' => $supervisores->url(1),
                'ultimo'  => $supervisores->url($supervisores->lastPage()),
                'anterior'  => $supervisores->previousPageUrl(),
                'siguiente'  => $supervisores->nextPageUrl(),
            ],
        ], 200);
    }

    /**
     * Guarda un nuevo recurso.
     */
    public function store(SupervisoreRequest $request): JsonResponse
    {
        $supervisore = Supervisore::create($request->validated());

        return response()->json(new SupervisoreResource($supervisore));
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(Supervisore $supervisore): JsonResponse
    {
        return response()->json(new SupervisoreResource($supervisore));
    }

    /**
     * Actualiza el recurso especificado.
     */
    public function update(SupervisoreRequest $request, Supervisore $supervisore): JsonResponse
    {
        $supervisore->update($request->validated());

        return response()->json(new SupervisoreResource($supervisore));
    }

    /**
     * Elimina el recurso especificado.
     */
    public function destroy(Supervisore $supervisore): Response
    {
        $supervisore->delete();

        return response()->json([
            'mensaje' => 'El supervisor fue eliminado correctamente.',
        ], 200);
    }
    
}
