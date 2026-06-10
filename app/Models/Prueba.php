<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Prueba
 *
 * @property $id
 * @property $fecha_prueba
 * @property $hora_prueba
 * @property $clubes_id
 * @property $usuarios_club_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Clube $clube
 * @property UsuariosClub $usuariosClub
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Prueba extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fecha_prueba', 'hora_prueba', 'clubes_id', 'usuarios_club_id'];


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
