<?php

namespace App\Http\Controllers\Api;

use App\Models\UsuariosClub;
use Illuminate\Http\Request;
use App\Http\Requests\UsuariosClubRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsuariosClubResource;

class UsuariosClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuariosClubs = UsuariosClub::paginate();

        return UsuariosClubResource::collection($usuariosClubs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuariosClubRequest $request): JsonResponse
    {
        $usuariosClub = UsuariosClub::create($request->validated());

        return response()->json(new UsuariosClubResource($usuariosClub));
    }

    /**
     * Display the specified resource.
     */
    public function show(UsuariosClub $usuariosClub): JsonResponse
    {
        return response()->json(new UsuariosClubResource($usuariosClub));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuariosClubRequest $request, UsuariosClub $usuariosClub): JsonResponse
    {
        $usuariosClub->update($request->validated());

        return response()->json(new UsuariosClubResource($usuariosClub));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(UsuariosClub $usuariosClub): Response
    {
        $usuariosClub->delete();

        return response()->noContent();
    }
}
