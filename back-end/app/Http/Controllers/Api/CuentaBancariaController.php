<?php

namespace App\Http\Controllers\Api;

use App\Models\CuentaBancaria;
use Illuminate\Http\Request;
use App\Http\Requests\CuentaBancariaRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CuentaBancariaResource;

class CuentaBancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cuentaBancarias = CuentaBancaria::paginate();

        return CuentaBancariaResource::collection($cuentaBancarias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CuentaBancariaRequest $request): JsonResponse
    {
        $cuentaBancaria = CuentaBancaria::create($request->validated());

        return response()->json(new CuentaBancariaResource($cuentaBancaria));
    }

    /**
     * Display the specified resource.
     */
    public function show(CuentaBancaria $cuentaBancaria): JsonResponse
    {
        return response()->json(new CuentaBancariaResource($cuentaBancaria));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CuentaBancariaRequest $request, CuentaBancaria $cuentaBancaria): JsonResponse
    {
        $cuentaBancaria->update($request->validated());

        return response()->json(new CuentaBancariaResource($cuentaBancaria));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(CuentaBancaria $cuentaBancaria): Response
    {
        $cuentaBancaria->delete();

        return response()->noContent();
    }
}
