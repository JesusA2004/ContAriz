<?php

namespace App\Http\Controllers\Api;

use App\Models\HistorialQuincena;
use Illuminate\Http\Request;
use App\Http\Requests\HistorialQuincenaRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\HistorialQuincenaResource;

class HistorialQuincenaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $historialQuincenas = HistorialQuincena::paginate();

        return HistorialQuincenaResource::collection($historialQuincenas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HistorialQuincenaRequest $request): JsonResponse
    {
        $historialQuincena = HistorialQuincena::create($request->validated());

        return response()->json(new HistorialQuincenaResource($historialQuincena));
    }

    /**
     * Display the specified resource.
     */
    public function show(HistorialQuincena $historialQuincena): JsonResponse
    {
        return response()->json(new HistorialQuincenaResource($historialQuincena));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HistorialQuincenaRequest $request, HistorialQuincena $historialQuincena): JsonResponse
    {
        $historialQuincena->update($request->validated());

        return response()->json(new HistorialQuincenaResource($historialQuincena));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(HistorialQuincena $historialQuincena): Response
    {
        $historialQuincena->delete();

        return response()->noContent();
    }
}
