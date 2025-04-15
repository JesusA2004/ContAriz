<?php

namespace App\Http\Controllers\Api;

use App\Models\SaldoImss;
use Illuminate\Http\Request;
use App\Http\Requests\SaldoImssRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SaldoImssResource;

class SaldoImssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $saldoImsses = SaldoImss::paginate();

        return SaldoImssResource::collection($saldoImsses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaldoImssRequest $request): JsonResponse
    {
        $saldoImss = SaldoImss::create($request->validated());

        return response()->json(new SaldoImssResource($saldoImss));
    }

    /**
     * Display the specified resource.
     */
    public function show(SaldoImss $saldoImss): JsonResponse
    {
        return response()->json(new SaldoImssResource($saldoImss));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaldoImssRequest $request, SaldoImss $saldoImss): JsonResponse
    {
        $saldoImss->update($request->validated());

        return response()->json(new SaldoImssResource($saldoImss));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(SaldoImss $saldoImss): Response
    {
        $saldoImss->delete();

        return response()->noContent();
    }
}
