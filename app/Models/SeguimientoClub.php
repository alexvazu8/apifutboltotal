<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SeguimientoClub
 *
 * @property $id
 * @property $clubes_id
 * @property $contacto_email
 * @property $contacto_telefono
 * @property $nombre_persona_contacto_club
 * @property $jugadores_id
 * @property $fecha
 * @property $texto
 * @property $estado
 */
class SeguimientoClub extends Model
{
    protected $table = 'seguimiento_clubes';
    protected $perPage = 20;

    protected $fillable = [
        'clubes_id',
        'contacto_email',
        'contacto_telefono',
        'nombre_persona_contacto_club',
        'jugadores_id',
        'fecha',
        'texto',
        'estado',
    ];

    public function clube()
    {
        return $this->belongsTo(\App\Models\Clube::class, 'clubes_id', 'id');
    }

    public function jugador()
    {
        return $this->belongsTo(\App\Models\Jugadore::class, 'jugadores_id', 'id');
    }
}
