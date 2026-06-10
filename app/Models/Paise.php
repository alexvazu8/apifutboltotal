<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paise
 *
 * @property $id
 * @property $nombre_pais
 * @property $created_at
 * @property $updated_at
 *
 * @property Ciudade[] $ciudades
 * @property Ciudade[] $ciudades
 * @property Ciudade[] $ciudades
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Paise extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre_pais'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ciudades()
    {
        return $this->hasMany(\App\Models\Ciudade::class, 'id', 'pais_id');
    }

    

    
}
