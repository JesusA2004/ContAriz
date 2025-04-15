<?php

namespace App\Http\Controllers\Api;

use App\Models\Supervisore;
use Illuminate\Http\Request;
use App\Http\Requests\SupervisoreRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupervisoreResource;

class SupervisoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $supervisores = Supervisore::paginate();

        return SupervisoreResource::collection($supervisores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupervisoreRequest $request): JsonResponse
    {
        $supervisore = Supervisore::create($request->validated());

        return response()->json(new SupervisoreResource($supervisore));
    }

    /**
     * Display the specified resource.
     */
    public function show(Supervisore $supervisore): JsonResponse
    {
        return response()->json(new SupervisoreResource($supervisore));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupervisoreRequest $request, Supervisore $supervisore): JsonResponse
    {
        $supervisore->update($request->validated());

        return response()->json(new SupervisoreResource($supervisore));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Supervisore $supervisore): Response
    {
        $supervisore->delete();

        return response()->noContent();
    }
}
