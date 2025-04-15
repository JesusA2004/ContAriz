<?php

namespace App\Http\Controllers\Api;

use App\Models\PrimaVacacionale;
use Illuminate\Http\Request;
use App\Http\Requests\PrimaVacacionaleRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PrimaVacacionaleResource;

class PrimaVacacionaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $primaVacacionales = PrimaVacacionale::paginate();

        return PrimaVacacionaleResource::collection($primaVacacionales);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrimaVacacionaleRequest $request): JsonResponse
    {
        $primaVacacionale = PrimaVacacionale::create($request->validated());

        return response()->json(new PrimaVacacionaleResource($primaVacacionale));
    }

    /**
     * Display the specified resource.
     */
    public function show(PrimaVacacionale $primaVacacionale): JsonResponse
    {
        return response()->json(new PrimaVacacionaleResource($primaVacacionale));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrimaVacacionaleRequest $request, PrimaVacacionale $primaVacacionale): JsonResponse
    {
        $primaVacacionale->update($request->validated());

        return response()->json(new PrimaVacacionaleResource($primaVacacionale));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(PrimaVacacionale $primaVacacionale): Response
    {
        $primaVacacionale->delete();

        return response()->noContent();
    }
}
