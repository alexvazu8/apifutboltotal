<?php

namespace App\Http\Controllers\Api;

use App\Models\PosicionesJugador;
use Illuminate\Http\Request;
use App\Http\Requests\PosicionesJugadorRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PosicionesJugadorResource;

class PosicionesJugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posicionesJugadors = PosicionesJugador::paginate();

        return PosicionesJugadorResource::collection($posicionesJugadors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PosicionesJugadorRequest $request): JsonResponse
    {
        $posicionesJugador = PosicionesJugador::create($request->validated());

        return response()->json(new PosicionesJugadorResource($posicionesJugador));
    }

    /**
     * Display the specified resource.
     */
    public function show(PosicionesJugador $posicionesJugador): JsonResponse
    {
        return response()->json(new PosicionesJugadorResource($posicionesJugador));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PosicionesJugadorRequest $request, PosicionesJugador $posicionesJugador): JsonResponse
    {
        $posicionesJugador->update($request->validated());

        return response()->json(new PosicionesJugadorResource($posicionesJugador));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(PosicionesJugador $posicionesJugador): Response
    {
        $posicionesJugador->delete();

        return response()->noContent();
    }
}
