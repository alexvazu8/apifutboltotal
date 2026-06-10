<?php

namespace App\Http\Controllers\Api;

use App\Models\Clube;
use Illuminate\Http\Request;
use App\Http\Requests\ClubeRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClubeResource;

class ClubeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clubes = Clube::paginate();

        return ClubeResource::collection($clubes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClubeRequest $request): JsonResponse
    {
        $clube = Clube::create($request->validated());

        return response()->json(new ClubeResource($clube));
    }

    /**
     * Display the specified resource.
     */
    public function show(Clube $clube): JsonResponse
    {
        return response()->json(new ClubeResource($clube));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClubeRequest $request, Clube $clube): JsonResponse
    {
        $clube->update($request->validated());

        return response()->json(new ClubeResource($clube));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Clube $clube): Response
    {
        $clube->delete();

        return response()->noContent();
    }
}
