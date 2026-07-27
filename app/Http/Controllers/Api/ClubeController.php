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
     * Admins ven todos, clubs solo ven su propio club
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $userRole = $user->getTipoUsuario();

        if ($userRole === 'admin') {
            $clubes = Clube::paginate();
        } elseif ($userRole === 'club') {
            $clubId = $user->usuarios_club?->clubes_id;
            $clubes = Clube::where('id', $clubId)->paginate();
        } else {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return ClubeResource::collection($clubes);
    }

    /**
     * Store a newly created resource in storage.
     * Solo admins
     */
    public function store(ClubeRequest $request): JsonResponse
    {
        $user = $request->user();
        if ($user->getTipoUsuario() !== 'admin') {
            return response()->json(['message' => 'Solo administradores pueden crear clubes'], 403);
        }

        $clube = Clube::create($request->validated());

        return response()->json(new ClubeResource($clube), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Clube $clube, Request $request): JsonResponse
    {
        $user = $request->user();
        
        if (!$this->canView($user, $clube)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return response()->json(new ClubeResource($clube));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClubeRequest $request, Clube $clube): JsonResponse
    {
        $user = $request->user();
        
        if (!$this->canUpdate($user, $clube)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $clube->update($request->validated());

        return response()->json(new ClubeResource($clube));
    }

    /**
     * Delete the specified resource.
     * Solo admins
     */
    public function destroy(Clube $clube, Request $request): Response
    {
        $user = $request->user();
        
        if ($user->getTipoUsuario() !== 'admin') {
            return response()->json(['message' => 'Solo administradores pueden eliminar clubes'], 403);
        }

        $clube->delete();

        return response()->noContent();
    }

    /**
     * Helpers
     */
    private function canView($user, $clube): bool
    {
        $userRole = $user->getTipoUsuario();
        
        if ($userRole === 'admin') {
            return true;
        }
        
        if ($userRole === 'club') {
            return $user->usuarios_club?->clubes_id === $clube->id;
        }
        
        return false;
    }

    private function canUpdate($user, $clube): bool
    {
        $userRole = $user->getTipoUsuario();
        
        if ($userRole === 'admin') {
            return true;
        }
        
        if ($userRole === 'club') {
            return $user->usuarios_club?->clubes_id === $clube->id;
        }
        
        return false;
    }
}
