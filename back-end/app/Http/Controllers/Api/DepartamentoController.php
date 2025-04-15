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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $departamentos = Departamento::paginate();

        return DepartamentoResource::collection($departamentos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartamentoRequest $request): JsonResponse
    {
        $departamento = Departamento::create($request->validated());

        return response()->json(new DepartamentoResource($departamento));
    }

    /**
     * Display the specified resource.
     */
    public function show(Departamento $departamento): JsonResponse
    {
        return response()->json(new DepartamentoResource($departamento));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartamentoRequest $request, Departamento $departamento): JsonResponse
    {
        $departamento->update($request->validated());

        return response()->json(new DepartamentoResource($departamento));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Departamento $departamento): Response
    {
        $departamento->delete();

        return response()->noContent();
    }
}
