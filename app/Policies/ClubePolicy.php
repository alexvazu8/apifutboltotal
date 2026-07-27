<?php

namespace App\Policies;

use App\Models\Clube;
use App\Models\User;

class ClubePolicy
{
    /**
     * Un club solo ve sus propios datos, admins ven todo
     */
    public function view(User $user, Clube $clube): bool
    {
        if ($user->getTipoUsuario() === 'admin') {
            return true;
        }

        if ($user->getTipoUsuario() === 'club') {
            return $user->usuarios_club?->clubes_id === $clube->id;
        }

        return false;
    }

    /**
     * Un club solo puede editar sus propios datos
     */
    public function update(User $user, Clube $clube): bool
    {
        if ($user->getTipoUsuario() === 'admin') {
            return true;
        }

        if ($user->getTipoUsuario() === 'club') {
            return $user->usuarios_club?->clubes_id === $clube->id;
        }

        return false;
    }

    /**
     * Solo admins pueden crear/eliminar clubes
     */
    public function create(User $user): bool
    {
        return $user->getTipoUsuario() === 'admin';
    }

    public function delete(User $user, Clube $clube): bool
    {
        return $user->getTipoUsuario() === 'admin';
    }
}
