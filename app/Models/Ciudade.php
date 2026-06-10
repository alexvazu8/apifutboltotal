<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ciudade
 *
 * @property $id
 * @property $nombre_ciudad
 * @property $pais_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Paise $paise
 * @property Clube[] $clubes
 * @property Clube[] $clubes
 * @property Zona[] $zonas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ciudade extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre_ciudad', 'pais_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paise()
    {
        return $this->belongsTo(\App\Models\Paise::class, 'pais_id', 'id');
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clubes()
    {
        return $this->hasMany(\App\Models\Clube::class, 'id', 'ciudad_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function zonas()
    {
        return $this->hasMany(\App\Models\Zona::class, 'id_ciudad', 'ciudad_id_ciudad');
    }
    
}
