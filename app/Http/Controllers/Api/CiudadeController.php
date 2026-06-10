<?php

namespace App\Http\Controllers\Api;

use App\Models\Ciudade;
use Illuminate\Http\Request;
use App\Http\Requests\CiudadeRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CiudadeResource;

class CiudadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ciudades = Ciudade::paginate();

        return CiudadeResource::collection($ciudades);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CiudadeRequest $request): JsonResponse
    {
        $ciudade = Ciudade::create($request->validated());

        return response()->json(new CiudadeResource($ciudade));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ciudade $ciudade): JsonResponse
    {
        return response()->json(new CiudadeResource($ciudade));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CiudadeRequest $request, Ciudade $ciudade): JsonResponse
    {
        $ciudade->update($request->validated());

        return response()->json(new CiudadeResource($ciudade));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Ciudade $ciudade): Response
    {
        $ciudade->delete();

        return response()->noContent();
    }
}
