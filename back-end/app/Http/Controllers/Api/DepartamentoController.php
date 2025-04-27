<?php

namespace App\Http\Controllers\Api;

use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Http\Requests\DepartamentoRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepartamentoResource;

class DepartamentoController extends Controller
{
    /**
     * Muestra una lista de recursos.
     */
    public function index(Request $request)
    {
        $departamentos = Departamento::paginate(20);

        return response()->json([
            'registros'  => DepartamentoResource::collection($departamentos)->resolve(),
            'enlaces' => [
                'primero' => $departamentos->url(1),
                'ultimo'  => $departamentos->url($departamentos->lastPage()),
                'anterior'  => $departamentos->previousPageUrl(),
                'siguiente'  => $departamentos->nextPageUrl(),
            ],
        ], 200);
    }

    /**
     * Guarda un nuevo recurso en el almacenamiento.
     */
    public function store(DepartamentoRequest $request): JsonResponse
    {
        $departamento = Departamento::create($request->validated());

        return response()->json(new DepartamentoResource($departamento));
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(Departamento $departamento): JsonResponse
    {
        return response()->json(new DepartamentoResource($departamento));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(DepartamentoRequest $request, Departamento $departamento): JsonResponse
    {
        $departamento->update($request->validated());

        return response()->json(new DepartamentoResource($departamento));
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Departamento $departamento): JsonResponse
    {
        $departamento->delete();

        return response()->json([
            'mensaje' => 'Departamento eliminado correctamente.',
        ], 200);
        
    }

}
