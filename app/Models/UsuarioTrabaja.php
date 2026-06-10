<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuarioTrabaja
 *
 * @property $id
 * @property $usuarios_club_id
 * @property $tipo_usuario_club
 * @property $clubes_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Clube $clube
 * @property UsuariosClub $usuariosClub
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UsuarioTrabaja extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['usuarios_club_id', 'tipo_usuario_club', 'clubes_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clube()
    {
        return $this->belongsTo(\App\Models\Clube::class, 'clubes_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuariosClub()
    {
        return $this->belongsTo(\App\Models\UsuariosClub::class, 'usuarios_club_id', 'id');
    }
    
}
