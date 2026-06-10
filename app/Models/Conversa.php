<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Conversa
 *
 * @property $id
 * @property $mensaje
 * @property $users_envia_id
 * @property $users_recibe_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Conversa extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['mensaje', 'users_envia_id', 'users_recibe_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_envia_id', 'id');
    }
    
 
}
