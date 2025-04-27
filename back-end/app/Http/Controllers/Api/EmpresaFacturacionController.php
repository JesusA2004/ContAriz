<?php

namespace App\Http\Controllers\Api;

use App\Models\EmpresaFacturacion;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaFacturacionRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmpresaFacturacionResource;

class EmpresaFacturacionController extends Controller
{
    /**
     * Muestra una lista de recursos.
     */
    public function index(Request $request)
    {
        $empresaFacturacions = EmpresaFacturacion::paginate(20);

        return response()->json([
            'registros'  => EmpresaFacturacionResource::collection($empresaFacturacions)->resolve(),
            'enlaces' => [
                'primero' => $empresaFacturacions->url(1),
                'ultimo'  => $empresaFacturacions->url($empresaFacturacions->lastPage()),
                'anterior'  => $empresaFacturacions->previousPageUrl(),
                'siguiente'  => $empresaFacturacions->nextPageUrl(),
            ],
        ], 200);
    }

    /**
     * Guarda un nuevo recurso en almacenamiento.
     */
    public function store(EmpresaFacturacionRequest $request): JsonResponse
    {
        $empresaFacturacion = EmpresaFacturacion::create($request->validated());

        return response()->json(new EmpresaFacturacionResource($empresaFacturacion));
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(EmpresaFacturacion $empresaFacturacion): JsonResponse
    {
        return response()->json(new EmpresaFacturacionResource($empresaFacturacion));
    }

    /**
     * Actualiza el recurso especificado en almacenamiento.
     */
    public function update(EmpresaFacturacionRequest $request, EmpresaFacturacion $empresaFacturacion): JsonResponse
    {
        $empresaFacturacion->update($request->validated());

        return response()->json(new EmpresaFacturacionResource($empresaFacturacion));
    }

    /**
     * Elimina el recurso especificado de almacenamiento.
     */
    public function destroy(EmpresaFacturacion $empresaFacturacion): Response
    {
        $empresaFacturacion->delete();

        return response()->json([
            'mensaje' => 'La empresa de facturacion ha sido eliminado correctamente.',
        ], 200);
    }
    
}
