<?php

namespace App\Http\Controllers\Api;

use App\Models\Vacacione;
use Illuminate\Http\Request;
use App\Http\Requests\VacacioneRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\VacacioneResource;

class VacacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $vacaciones = Vacacione::paginate();

        return VacacioneResource::collection($vacaciones);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VacacioneRequest $request): JsonResponse
    {
        $vacacione = Vacacione::create($request->validated());

        return response()->json(new VacacioneResource($vacacione));
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacacione $vacacione): JsonResponse
    {
        return response()->json(new VacacioneResource($vacacione));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VacacioneRequest $request, Vacacione $vacacione): JsonResponse
    {
        $vacacione->update($request->validated());

        return response()->json(new VacacioneResource($vacacione));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Vacacione $vacacione): Response
    {
        $vacacione->delete();

        return response()->noContent();
    }
}
