<?php

namespace App\Http\Controllers\Api;

use App\Models\Plaza;
use Illuminate\Http\Request;
use App\Http\Requests\PlazaRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlazaResource;

class PlazaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $plazas = Plaza::paginate();

        return PlazaResource::collection($plazas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlazaRequest $request): JsonResponse
    {
        $plaza = Plaza::create($request->validated());

        return response()->json(new PlazaResource($plaza));
    }

    /**
     * Display the specified resource.
     */
    public function show(Plaza $plaza): JsonResponse
    {
        return response()->json(new PlazaResource($plaza));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlazaRequest $request, Plaza $plaza): JsonResponse
    {
        $plaza->update($request->validated());

        return response()->json(new PlazaResource($plaza));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Plaza $plaza): Response
    {
        $plaza->delete();

        return response()->noContent();
    }
}
