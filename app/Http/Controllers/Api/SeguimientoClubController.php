<?php

namespace App\Http\Controllers\Api;

use App\Models\SeguimientoClub;
use Illuminate\Http\Request;
use App\Http\Requests\SeguimientoClubRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeguimientoClubResource;

class SeguimientoClubController extends Controller
{
    /**
     * Display a listing of the resource.
     * Clubs ven solo sus seguimientos, admins ven todos
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $userRole = $user->getTipoUsuario();

        if ($userRole === 'admin') {
            $items = SeguimientoClub::paginate();
        } elseif ($userRole === 'club') {
            $items = SeguimientoClub::where('clubes_id', $user->usuarios_club->clubes_id)->paginate();
        } else {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return SeguimientoClubResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     * Solo clubs y admins
     */
    public function store(SeguimientoClubRequest $request): JsonResponse
    {
        $user = $request->user();
        $userRole = $user->getTipoUsuario();

        if ($userRole !== 'admin' && $userRole !== 'club') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        // Si es club, asigna automáticamente su club
        if ($userRole === 'club') {
            $request->merge(['clubes_id' => $user->usuarios_club->clubes_id]);
        }

        $item = SeguimientoClub::create($request->validated());
        return response()->json(new SeguimientoClubResource($item), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SeguimientoClub $seguimientoClub, Request $request): JsonResponse
    {
        $user = $request->user();
        
        if (!$this->canView($user, $seguimientoClub)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return response()->json(new SeguimientoClubResource($seguimientoClub));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeguimientoClubRequest $request, SeguimientoClub $seguimientoClub): JsonResponse
    {
        $user = $request->user();
        
        if (!$this->canUpdate($user, $seguimientoClub)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $seguimientoClub->update($request->validated());
        return response()->json(new SeguimientoClubResource($seguimientoClub));
    }

    /**
     * Delete the specified resource.
     */
    public function destroy(SeguimientoClub $seguimientoClub, Request $request): Response
    {
        $user = $request->user();
        
        if (!$this->canDelete($user, $seguimientoClub)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $seguimientoClub->delete();
        return response()->noContent();
    }

    /**
     * Helpers
     */
    private function canView($user, $seguimientoClub): bool
    {
        $userRole = $user->getTipoUsuario();

        if ($userRole === 'admin') {
            return true;
        }

        if ($userRole === 'club') {
            return $user->usuarios_club->clubes_id === $seguimientoClub->clubes_id;
        }

        return false;
    }

    private function canUpdate($user, $seguimientoClub): bool
    {
        $userRole = $user->getTipoUsuario();

        if ($userRole === 'admin') {
            return true;
        }

        if ($userRole === 'club') {
            return $user->usuarios_club->clubes_id === $seguimientoClub->clubes_id;
        }

        return false;
    }

    private function canDelete($user, $seguimientoClub): bool
    {
        return $this->canUpdate($user, $seguimientoClub);
    }
}
