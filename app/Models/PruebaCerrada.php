<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PruebaCerrada
 *
 * @property $id
 * @property $fecha_inicio
 * @property $fecha_final
 * @property $jugadores_id
 * @property $clubes_id
 * @property $usuarios_club_id
 * @property $lugar
 * @property $alojamiento_incluido
 */
class PruebaCerrada extends Model
{
    protected $table = 'pruebas_cerradas';
    protected $perPage = 20;

    protected $fillable = [
        'fecha_inicio',
        'fecha_final',
        'jugadores_id',
        'clubes_id',
        'usuarios_club_id',
        'lugar',
        'alojamiento_incluido',
    ];

    public function jugador()
    {
        return $this->belongsTo(\App\Models\Jugadore::class, 'jugadores_id', 'id');
    }

    public function clube()
    {
        return $this->belongsTo(\App\Models\Clube::class, 'clubes_id', 'id');
    }

    public function usuariosClub()
    {
        return $this->belongsTo(\App\Models\UsuariosClub::class, 'usuarios_club_id', 'id');
    }
}
