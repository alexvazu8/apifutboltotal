<?php

namespace App\Http\Controllers\Api;

use App\Models\Jugadore;
use Illuminate\Http\Request;
use App\Http\Requests\JugadoreRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\JugadoreResource;

class JugadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jugadores = Jugadore::paginate();

        return JugadoreResource::collection($jugadores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JugadoreRequest $request): JsonResponse
    {
        $jugadore = Jugadore::create($request->validated());

        return response()->json(new JugadoreResource($jugadore));
    }

    /**
     * Display the specified resource.
     */
    public function show(Jugadore $jugadore): JsonResponse
    {
        return response()->json(new JugadoreResource($jugadore));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JugadoreRequest $request, Jugadore $jugadore): JsonResponse
    {
        $jugadore->update($request->validated());

        return response()->json(new JugadoreResource($jugadore));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Jugadore $jugadore): Response
    {
        $jugadore->delete();

        return response()->noContent();
    }
}
