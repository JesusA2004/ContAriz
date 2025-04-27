<?php

namespace App\Http\Controllers\Api;

use App\Models\Patron;
use Illuminate\Http\Request;
use App\Http\Requests\PatronRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PatronResource;

class PatronController extends Controller
{

    /**
     * Muestra una lista de los recursos.
     */
    public function index(Request $request)
    {
        $patrons = Patron::paginate(20);

        return response()->json([
            'registros'  => PatronResource::collection($patrons)->resolve(),
            'enlaces' => [
                'primero' => $patrons->url(1),
                'ultimo'  => $patrons->url($patrons->lastPage()),
                'anterior'  => $patrons->previousPageUrl(),
                'siguiente'  => $patrons->nextPageUrl(),
            ],
        ], 200);
    }

    /**
     * Guarda un nuevo recurso en el almacenamiento.
     */
    public function store(PatronRequest $request): JsonResponse
    {
        $patron = Patron::create($request->validated());

        return response()->json(new PatronResource($patron));
    }

    /**
     * Muestra el recurso especificado.
     */
    public function show(Patron $patron): JsonResponse
    {
        return response()->json(new PatronResource($patron));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     */
    public function update(PatronRequest $request, Patron $patron): JsonResponse
    {
        $patron->update($request->validated());

        return response()->json(new PatronResource($patron));
    }

    /**
     * Elimina el recurso especificado de almacenamiento.
     */
    public function destroy(Patron $patron): JsonResponse
    {
        $patron->delete();

        return response()->json([
            'mensaje' => 'Patrón eliminado correctamente.',
        ], 200); // 🔥 Código 200 OK
    }
    
}
