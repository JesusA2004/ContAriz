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
     * Muestra la lista de recursos.
     */
    public function index(Request $request)
    {
        $cuentaBancarias = CuentaBancaria::paginate(20);

        return response()->json([
            'registros'  => CuentaBancariaResource::collection($cuentaBancarias)->resolve(),
            'enlaces' => [
                'primero' => $cuentaBancarias->url(1),
                'ultimo'  => $cuentaBancarias->url($cuentaBancarias->lastPage()),
                'anterior'  => $cuentaBancarias->previousPageUrl(),
                'siguiente'  => $cuentaBancarias->nextPageUrl(),
            ],
        ], 200);
    }

    /**
     * Guarda un nuevo recurso en el almacenamiento.
     */
    public function store(CuentaBancariaRequest $request): JsonResponse
    {
        $cuentaBancaria = CuentaBancaria::create($request->validated());

        return response()->json(new CuentaBancariaResource($cuentaBancaria));
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(CuentaBancaria $cuentaBancaria): JsonResponse
    {
        return response()->json(new CuentaBancariaResource($cuentaBancaria));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(CuentaBancariaRequest $request, CuentaBancaria $cuentaBancaria): JsonResponse
    {
        $cuentaBancaria->update($request->validated());

        return response()->json(new CuentaBancariaResource($cuentaBancaria));
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     */
    public function destroy(CuentaBancaria $cuentaBancaria): Response
    {
        $cuentaBancaria->delete();

        return response()->json([
            'mensaje' => 'Cuenta bancaria eliminada correctamente.',
        ], 200);
    }
    
}
