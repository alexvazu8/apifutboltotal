<?php

namespace App\Http\Controllers\Api;

use App\Models\Jugadore;
use Illuminate\Http\Request;
use App\Http\Requests\JugadoreRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\JugadoreResource;
use Illuminate\Support\Facades\Storage;

class JugadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     * Admins ven todos, jugadores solo ven sus propios datos
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $userRole = $user->getTipoUsuario();

        if ($userRole === 'admin') {
            $jugadores = Jugadore::paginate();
        } elseif ($userRole === 'jugador') {
            $jugadores = Jugadore::where('users_id', $user->id)->paginate();
        } else {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return JugadoreResource::collection($jugadores);
    }

    /**
     * Store a newly created resource in storage.
     * Solo admins pueden crear
     */
    public function store(JugadoreRequest $request): JsonResponse
    {
        $user = $request->user();
        if ($user->getTipoUsuario() !== 'admin') {
            return response()->json(['message' => 'Solo administradores pueden crear jugadores'], 403);
        }

        $jugadore = Jugadore::create($request->validated());

        return response()->json(new JugadoreResource($jugadore), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jugadore $jugadore, Request $request): JsonResponse
    {
        $user = $request->user();
        
        if (!$this->canView($user, $jugadore)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return response()->json(new JugadoreResource($jugadore));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JugadoreRequest $request, Jugadore $jugadore): JsonResponse
    {
        $user = $request->user();
        
        if (!$this->canUpdate($user, $jugadore)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $jugadore->update($request->validated());

        return response()->json(new JugadoreResource($jugadore));
    }

    /**
     * Guarda la foto del jugador y conserva solo su ruta relativa.
     */
    public function updatePhoto(Request $request, Jugadore $jugadore): JsonResponse
    {
        $user = $request->user();

        if (!$this->canUpdate($user, $jugadore)) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $request->validate([
            'foto_jugador' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $storedPath = $request->file('foto_jugador')->store('jugadores', 'public');
        $newPath = 'storage/'.$storedPath;
        $previousPath = $jugadore->path_foto_jugador;

        try {
            $jugadore->update(['path_foto_jugador' => $newPath]);
        } catch (\Throwable $exception) {
            Storage::disk('public')->delete($storedPath);
            throw $exception;
        }

        if ($previousPath) {
            Storage::disk('public')->delete($this->diskPath($previousPath));
        }

        return response()->json(new JugadoreResource($jugadore));
    }

    /**
     * Delete the specified resource.
     * Solo admins pueden eliminar
     */
    public function destroy(Jugadore $jugadore, Request $request): Response
    {
        $user = $request->user();
        
        if ($user->getTipoUsuario() !== 'admin') {
            return response()->json(['message' => 'Solo administradores pueden eliminar jugadores'], 403);
        }

        $jugadore->delete();

        return response()->noContent();
    }

    /**
     * Helpers
     */
    private function canView($user, $jugadore): bool
    {
        $userRole = $user->getTipoUsuario();
        return $userRole === 'admin' || ($userRole === 'jugador' && $user->jugador?->id === $jugadore->id);
    }

    private function canUpdate($user, $jugadore): bool
    {
        $userRole = $user->getTipoUsuario();
        return $userRole === 'admin' || ($userRole === 'jugador' && $user->jugador?->id === $jugadore->id);
    }

    private function diskPath(string $path): string
    {
        return str_starts_with($path, 'storage/')
            ? substr($path, strlen('storage/'))
            : $path;
    }
}
