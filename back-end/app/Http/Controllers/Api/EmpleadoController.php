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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $empleados = Empleado::paginate();

        return EmpleadoResource::collection($empleados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpleadoRequest $request): JsonResponse
    {
        $empleado = Empleado::create($request->validated());

        return response()->json(new EmpleadoResource($empleado));
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado): JsonResponse
    {
        return response()->json(new EmpleadoResource($empleado));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpleadoRequest $request, Empleado $empleado): JsonResponse
    {
        $empleado->update($request->validated());

        return response()->json(new EmpleadoResource($empleado));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Empleado $empleado): Response
    {
        $empleado->delete();

        return response()->noContent();
    }
}
