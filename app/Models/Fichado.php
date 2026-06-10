<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fichado
 *
 * @property $id
 * @property $fecha_fichaje
 * @property $fecha_final_fichaje
 * @property $jugadores_id
 * @property $clubes_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Clube $clube
 * @property Jugadore $jugadore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Fichado extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fecha_fichaje', 'fecha_final_fichaje', 'jugadores_id', 'clubes_id'];


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
    public function jugadore()
    {
        return $this->belongsTo(\App\Models\Jugadore::class, 'jugadores_id', 'id');
    }
    
}
