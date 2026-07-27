<?php

namespace App\Policies;

use App\Models\Jugadore;
use App\Models\User;

class JugadorePolicy
{
    /**
     * Un jugador solo puede ver sus propios datos
     */
    public function view(User $user, Jugadore $jugadore): bool
    {
        return $user->getTipoUsuario() === 'admin' || $user->jugador?->id === $jugadore->id;
    }

    /**
     * Un jugador solo puede editar sus propios datos
     */
    public function update(User $user, Jugadore $jugadore): bool
    {
        return $user->getTipoUsuario() === 'admin' || $user->jugador?->id === $jugadore->id;
    }

    /**
     * Solo admins pueden crear jugadores
     */
    public function create(User $user): bool
    {
        return $user->getTipoUsuario() === 'admin';
    }

    /**
     * Solo admins pueden eliminar jugadores
     */
    public function delete(User $user, Jugadore $jugadore): bool
    {
        return $user->getTipoUsuario() === 'admin';
    }
}
