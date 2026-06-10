<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PosicionesJugador
 *
 * @property $id
 * @property $posiciones_id
 * @property $jugadores_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Jugadore $jugadore
 * @property Posicione $posicione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PosicionesJugador extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['posiciones_id', 'jugadores_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jugadore()
    {
        return $this->belongsTo(\App\Models\Jugadore::class, 'jugadores_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posicione()
    {
        return $this->belongsTo(\App\Models\Posicione::class, 'posiciones_id', 'id');
    }
    
}
