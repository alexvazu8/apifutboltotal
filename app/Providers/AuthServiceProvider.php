<?php

namespace App\Providers;

use App\Models\Clube;
use App\Models\Jugadore;
use App\Models\Prueba;
use App\Policies\ClubePolicy;
use App\Policies\JugadorePolicy;
use App\Policies\PruebaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Jugadore::class => JugadorePolicy::class,
        Clube::class => ClubePolicy::class,
        Prueba::class => PruebaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
