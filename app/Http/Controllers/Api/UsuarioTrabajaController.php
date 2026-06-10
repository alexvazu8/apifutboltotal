<?php

namespace App\Http\Controllers\Api;

use App\Models\UsuarioTrabaja;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioTrabajaRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsuarioTrabajaResource;

class UsuarioTrabajaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuarioTrabajas = UsuarioTrabaja::paginate();

        return UsuarioTrabajaResource::collection($usuarioTrabajas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioTrabajaRequest $request): JsonResponse
    {
        $usuarioTrabaja = UsuarioTrabaja::create($request->validated());

        return response()->json(new UsuarioTrabajaResource($usuarioTrabaja));
    }

    /**
     * Display the specified resource.
     */
    public function show(UsuarioTrabaja $usuarioTrabaja): JsonResponse
    {
        return response()->json(new UsuarioTrabajaResource($usuarioTrabaja));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioTrabajaRequest $request, UsuarioTrabaja $usuarioTrabaja): JsonResponse
    {
        $usuarioTrabaja->update($request->validated());

        return response()->json(new UsuarioTrabajaResource($usuarioTrabaja));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(UsuarioTrabaja $usuarioTrabaja): Response
    {
        $usuarioTrabaja->delete();

        return response()->noContent();
    }
}
