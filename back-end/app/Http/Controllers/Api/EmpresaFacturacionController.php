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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $empresaFacturacions = EmpresaFacturacion::paginate();

        return EmpresaFacturacionResource::collection($empresaFacturacions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpresaFacturacionRequest $request): JsonResponse
    {
        $empresaFacturacion = EmpresaFacturacion::create($request->validated());

        return response()->json(new EmpresaFacturacionResource($empresaFacturacion));
    }

    /**
     * Display the specified resource.
     */
    public function show(EmpresaFacturacion $empresaFacturacion): JsonResponse
    {
        return response()->json(new EmpresaFacturacionResource($empresaFacturacion));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpresaFacturacionRequest $request, EmpresaFacturacion $empresaFacturacion): JsonResponse
    {
        $empresaFacturacion->update($request->validated());

        return response()->json(new EmpresaFacturacionResource($empresaFacturacion));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(EmpresaFacturacion $empresaFacturacion): Response
    {
        $empresaFacturacion->delete();

        return response()->noContent();
    }
}
