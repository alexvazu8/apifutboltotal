<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuariosClub
 *
 * @property $id
 * @property $users_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property ClinicaDePago[] $clinicaDePagos
 * @property Prueba[] $pruebas
 * @property UsuarioTrabaja[] $usuarioTrabajas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UsuariosClub extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['users_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clinicaDePagos()
    {
        return $this->hasMany(\App\Models\ClinicaDePago::class, 'id', 'usuarios_club_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pruebas()
    {
        return $this->hasMany(\App\Models\Prueba::class, 'id', 'usuarios_club_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarioTrabajas()
    {
        return $this->hasMany(\App\Models\UsuarioTrabaja::class, 'id', 'usuarios_club_id');
    }
    
}
