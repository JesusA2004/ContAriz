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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $patrons = Patron::paginate();

        return PatronResource::collection($patrons);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatronRequest $request): JsonResponse
    {
        $patron = Patron::create($request->validated());

        return response()->json(new PatronResource($patron));
    }

    /**
     * Display the specified resource.
     */
    public function show(Patron $patron): JsonResponse
    {
        return response()->json(new PatronResource($patron));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatronRequest $request, Patron $patron): JsonResponse
    {
        $patron->update($request->validated());

        return response()->json(new PatronResource($patron));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Patron $patron): JsonResponse
    {
        $patron->delete();

        return response()->json([
            'message' => 'Patrón eliminado correctamente.',
        ], 200); // 🔥 Código 200 OK
    }
    
}
