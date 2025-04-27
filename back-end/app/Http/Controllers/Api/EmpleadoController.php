<?php

namespace App\Http\Controllers\Api;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\EmpleadoRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmpleadoResource;

class EmpleadoController extends Controller
{
    /**
     *  Muestra una lista de los recursos.
     */
    public function index(Request $request)
    {
        $empleados = Empleado::paginate(20);

        return response()->json([
            'registros'  => EmpleadoResource::collection($empleados)->resolve(),
            'enlaces' => [
                'primero' => $empleados->url(1),
                'ultimo'  => $empleados->url($empleados->lastPage()),
                'anterior'  => $empleados->previousPageUrl(),
                'siguiente'  => $empleados->nextPageUrl(),
            ],
        ], 200);
    }

    /**
     * Guarda un nuevo recurso en el almacenamiento.
     */
    public function store(EmpleadoRequest $request): JsonResponse
    {
        $empleado = Empleado::create($request->validated());

        return response()->json(new EmpleadoResource($empleado));
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(Empleado $empleado): JsonResponse
    {
        return response()->json(new EmpleadoResource($empleado));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(EmpleadoRequest $request, Empleado $empleado): JsonResponse
    {
        $empleado->update($request->validated());

        return response()->json(new EmpleadoResource($empleado));
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(Empleado $empleado): JsonResponse
    {
        $empleado->delete();

        return response()->json([
            'mensaje' => 'Empleado eliminado correctamente',
        ], 200);
    }
    
}
