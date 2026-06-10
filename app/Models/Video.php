<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Video
 *
 * @property $id
 * @property $titulo_video
 * @property $link_video
 * @property $jugadores_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Jugadore $jugadore
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Video extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['titulo_video', 'link_video', 'jugadores_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jugadore()
    {
        return $this->belongsTo(\App\Models\Jugadore::class, 'jugadores_id', 'id');
    }
    
}
