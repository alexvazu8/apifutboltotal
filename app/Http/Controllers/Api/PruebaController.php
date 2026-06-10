<?php

namespace App\Http\Controllers\Api;

use App\Models\Prueba;
use Illuminate\Http\Request;
use App\Http\Requests\PruebaRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PruebaResource;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pruebas = Prueba::paginate();

        return PruebaResource::collection($pruebas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PruebaRequest $request): JsonResponse
    {
        $prueba = Prueba::create($request->validated());

        return response()->json(new PruebaResource($prueba));
    }

    /**
     * Display the specified resource.
     */
    public function show(Prueba $prueba): JsonResponse
    {
        return response()->json(new PruebaResource($prueba));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PruebaRequest $request, Prueba $prueba): JsonResponse
    {
        $prueba->update($request->validated());

        return response()->json(new PruebaResource($prueba));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Prueba $prueba): Response
    {
        $prueba->delete();

        return response()->noContent();
    }
}
