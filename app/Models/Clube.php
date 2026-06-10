<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Clube
 *
 * @property $id
 * @property $nombre_club
 * @property $link_escudo
 * @property $ciudad_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Ciudade $ciudade
 * @property ClinicaDePago[] $clinicaDePagos
 * @property Fichado[] $fichados
 * @property Prueba[] $pruebas
 * @property UsuarioTrabaja[] $usuarioTrabajas
 * @property ClinicaDePago[] $clinicaDePagos
 * @property Fichado[] $fichados
 * @property Prueba[] $pruebas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Clube extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre_club', 'link_escudo', 'ciudad_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ciudade()
    {
        return $this->belongsTo(\App\Models\Ciudade::class, 'ciudad_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clinicaDePagos()
    {
        return $this->hasMany(\App\Models\ClinicaDePago::class, 'id', 'clubes_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fichados()
    {
        return $this->hasMany(\App\Models\Fichado::class, 'id', 'clubes_id');
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarioTrabajas()
    {
        return $this->hasMany(\App\Models\UsuarioTrabaja::class, 'id', 'clubes_id');
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pruebas()
    {
        return $this->hasMany(\App\Models\Prueba::class, 'id', 'clubes_id');
    }
    
}
