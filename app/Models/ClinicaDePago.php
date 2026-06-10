<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClinicaDePago
 *
 * @property $id
 * @property $fecha_inicio_clinica
 * @property $fecha_fin_clinica
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
class ClinicaDePago extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['fecha_inicio_clinica', 'fecha_fin_clinica', 'clubes_id', 'usuarios_club_id'];


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
