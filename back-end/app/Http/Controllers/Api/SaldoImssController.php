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
     * Muestra una lista de los recursos.
     */
    public function index(Request $request)
    {
        $saldoImsses = SaldoImss::paginate(20);

        return response()->json([
            'registros'  => SaldoImssResource::collection($saldoImsses)->resolve(),
            'enlaces' => [
                'primero' => $saldoImsses->url(1),
                'ultimo'  => $saldoImsses->url($saldoImsses->lastPage()),
                'anterior'  => $saldoImsses->previousPageUrl(),
                'siguiente'  => $saldoImsses->nextPageUrl(),
            ],
        ], 200);
    }

    /**
     * Guarda un nuevo recurso.
     */
    public function store(SaldoImssRequest $request): JsonResponse
    {
        $saldoImss = SaldoImss::create($request->validated());

        return response()->json(new SaldoImssResource($saldoImss));
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(SaldoImss $saldoImss): JsonResponse
    {
        return response()->json(new SaldoImssResource($saldoImss));
    }

    /**
     * Actualiza el recurso especificado.
     */
    public function update(SaldoImssRequest $request, SaldoImss $saldoImss): JsonResponse
    {
        $saldoImss->update($request->validated());

        return response()->json(new SaldoImssResource($saldoImss));
    }

    /**
     * Elimina el recurso especificado.
     */
    public function destroy(SaldoImss $saldoImss): JsonResponse
    {
        $saldoImss->delete();

        return response()->json([
            'mensaje' => 'Saldo imss fue eliminado correctamente.',
        ], 200);
    }
}
