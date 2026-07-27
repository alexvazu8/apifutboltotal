<?php

namespace App\Policies;

use App\Models\Prueba;
use App\Models\User;

class PruebaPolicy
{
    /**
     * Jugador ve solo sus pruebas, clubs ve sus pruebas, admin ve todo
     */
    public function view(User $user, Prueba $prueba): bool
    {
        $userRole = $user->getTipoUsuario();

        if ($userRole === 'admin') {
            return true;
        }

        if ($userRole === 'jugador') {
            return $user->jugador?->id === $prueba->jugadores_id;
        }

        if ($userRole === 'club') {
            return $user->usuarios_club?->clubes_id === $prueba->clubes_id;
        }

        return false;
    }

    /**
     * Clubs crean pruebas de jugadores, admins también
     */
    public function create(User $user): bool
    {
        $userRole = $user->getTipoUsuario();
        return in_array($userRole, ['admin', 'club']);
    }

    /**
     * Club edita sus pruebas, admin edita cualquiera
     */
    public function update(User $user, Prueba $prueba): bool
    {
        if ($user->getTipoUsuario() === 'admin') {
            return true;
        }

        if ($user->getTipoUsuario() === 'club') {
            return $user->usuarios_club?->clubes_id === $prueba->clubes_id;
        }

        return false;
    }

    /**
     * Club elimina sus pruebas, admin elimina cualquiera
     */
    public function delete(User $user, Prueba $prueba): bool
    {
        if ($user->getTipoUsuario() === 'admin') {
            return true;
        }

        if ($user->getTipoUsuario() === 'club') {
            return $user->usuarios_club?->clubes_id === $prueba->clubes_id;
        }

        return false;
    }
}
