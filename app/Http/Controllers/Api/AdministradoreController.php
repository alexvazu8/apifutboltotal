<?php

namespace App\Http\Controllers\Api;

use App\Models\Administradore;
use Illuminate\Http\Request;
use App\Http\Requests\AdministradoreRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdministradoreResource;

class AdministradoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $administradores = Administradore::paginate();

        return AdministradoreResource::collection($administradores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdministradoreRequest $request): JsonResponse
    {
        $administradore = Administradore::create($request->validated());

        return response()->json(new AdministradoreResource($administradore));
    }

    /**
     * Display the specified resource.
     */
    public function show(Administradore $administradore): JsonResponse
    {
        return response()->json(new AdministradoreResource($administradore));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdministradoreRequest $request, Administradore $administradore): JsonResponse
    {
        $administradore->update($request->validated());

        return response()->json(new AdministradoreResource($administradore));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(Administradore $administradore): Response
    {
        $administradore->delete();

        return response()->noContent();
    }
}
