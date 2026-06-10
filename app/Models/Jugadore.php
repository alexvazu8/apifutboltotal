<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Jugadore
 *
 * @property $id
 * @property $pierna_habil
 * @property $fecha_nacimiento
 * @property $altura
 * @property $peso
 * @property $descripcion_jugador
 * @property $users_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property Fichado[] $fichados
 * @property PosicionesJugador[] $posicionesJugadors
 * @property Video[] $videos
 * @property Fichado[] $fichados
 * @property PosicionesJugador[] $posicionesJugadors
 * @property Video[] $videos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Jugadore extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['pierna_habil', 'fecha_nacimiento', 'altura', 'peso', 'descripcion_jugador', 'users_id'];


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
    public function fichados()
    {
        return $this->hasMany(\App\Models\Fichado::class, 'id', 'jugadores_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posicionesJugadors()
    {
        return $this->hasMany(\App\Models\PosicionesJugador::class, 'id', 'jugadores_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function videos()
    {
        return $this->hasMany(\App\Models\Video::class, 'id', 'jugadores_id');
    }
            
    
}
