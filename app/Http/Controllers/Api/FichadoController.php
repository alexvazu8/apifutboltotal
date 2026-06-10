<?php

namespace App\Http\Controllers\Api;

use App\Models\Fichado;
use Illuminate\Http\Request;
use App\Http\Requests\FichadoRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\FichadoResource;

class FichadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $fichados = Fichado::paginate();

        return FichadoResource::collection($fichados);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FichadoRequest $request): JsonResponse
    {
        $fichado = Fichado::create($request->validated());

        return response()->json(new FichadoResource($fichado));
    }

    /**
     * Display the specified resource.
     */
    public function show(Fichado $fichado): JsonResponse
    {
        return response()->json(new FichadoResource($fichado));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FichadoRequest $request, Fichado $fichado): JsonResponse
    {
        $fichado->update($request->validated());

        return response()->json(new FichadoResource($fichado));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Fichado $fichado): Response
    {
        $fichado->delete();

        return response()->noContent();
    }
}
