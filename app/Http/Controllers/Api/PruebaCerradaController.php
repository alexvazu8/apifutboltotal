<?php

namespace App\Http\Controllers\Api;

use App\Models\PruebaCerrada;
use Illuminate\Http\Request;
use App\Http\Requests\PruebaCerradaRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PruebaCerradaResource;

class PruebaCerradaController extends Controller
{
    /**
     * Display a listing of the resource.
     * Jugadores ven solo sus pruebas cerradas, admins ven todas
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $userRole = $user->getTipoUsuario();

        if ($userRole === 'admin') {
            $items = PruebaCerrada::paginate();
        } elseif ($userRole === 'jugador') {
            $items = PruebaCerrada::where('jugadores_id', $user->jugador->id)->paginate();
        } else {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return PruebaCerradaResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     * Solo jugadores y admins
     */
    public function store(PruebaCerradaRequest $request): JsonResponse
    {
        $user = $request->user();
        $userRole = $user->getTipoUsuario();

        if ($userRole !== 'admin' && $userRole !== 'jugador') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        // Si es jugador, asigna automáticamente su id
        if ($userRole === 'jugador') {
            $request->merge(['jugadores_id' => $user->jugador->id]);
        }

        $item = PruebaCerrada::create($request->validated());
        return response()->json(new PruebaCerradaResource($item), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PruebaCerrada $pruebaCerrada, Request $request): JsonResponse
    {
        $user = $request->user();
        
        if (!$this->canView($user, $pruebaCerrada)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return response()->json(new PruebaCerradaResource($pruebaCerrada));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PruebaCerradaRequest $request, PruebaCerrada $pruebaCerrada): JsonResponse
    {
        $user = $request->user();
        
        if (!$this->canUpdate($user, $pruebaCerrada)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $pruebaCerrada->update($request->validated());
        return response()->json(new PruebaCerradaResource($pruebaCerrada));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(PruebaCerrada $pruebaCerrada, Request $request): Response
    {
        $user = $request->user();
        
        if (!$this->canDelete($user, $pruebaCerrada)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $pruebaCerrada->delete();
        return response()->noContent();
    }

    /**
     * Helpers
     */
    private function canView($user, $pruebaCerrada): bool
    {
        $userRole = $user->getTipoUsuario();

        if ($userRole === 'admin') {
            return true;
        }

        if ($userRole === 'jugador') {
            return $user->jugador->id === $pruebaCerrada->jugadores_id;
        }

        return false;
    }

    private function canUpdate($user, $pruebaCerrada): bool
    {
        $userRole = $user->getTipoUsuario();

        if ($userRole === 'admin') {
            return true;
        }

        if ($userRole === 'jugador') {
            return $user->jugador->id === $pruebaCerrada->jugadores_id;
        }

        return false;
    }

    private function canDelete($user, $pruebaCerrada): bool
    {
        return $this->canUpdate($user, $pruebaCerrada);
    }
}
