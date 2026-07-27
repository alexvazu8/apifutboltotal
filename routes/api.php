<?php

use App\Http\Controllers\Api\AdministradoreController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CiudadeController;
use App\Http\Controllers\Api\ClinicaDePagoController;
use App\Http\Controllers\Api\ClubeController;
use App\Http\Controllers\Api\ConversaController;
use App\Http\Controllers\Api\FichadoController;
use App\Http\Controllers\Api\JugadoreController;
use App\Http\Controllers\Api\PaiseController;
use App\Http\Controllers\Api\PosicionesJugadorController;
use App\Http\Controllers\Api\PruebaController;
use App\Http\Controllers\Api\PruebaCerradaController;
use App\Http\Controllers\Api\SeguimientoClubController;
use App\Http\Controllers\Api\UsuariosClubController;
use App\Http\Controllers\Api\UsuarioTrabajaController;
use App\Http\Controllers\Api\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/register-jugador', [AuthController::class, 'registerJugador']);
Route::post('/refresh', [AuthController::class, 'refresh']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // ========== RECURSOS PÚBLICOS (Todos los roles autenticados) ==========
    Route::apiResource('paises', PaiseController::class, ['only' => ['index', 'show']]);
    Route::apiResource('ciudades', CiudadeController::class, ['only' => ['index', 'show']]);
    Route::apiResource('posiciones-jugadors', PosicionesJugadorController::class, ['only' => ['index', 'show']]);

    // ========== SOLO ADMINISTRADORES ==========
    Route::middleware('role:admin')->group(function () {
        Route::apiResource('administradores', AdministradoreController::class);
        Route::apiResource('paises', PaiseController::class, ['only' => ['store', 'update', 'destroy']]);
        Route::apiResource('ciudades', CiudadeController::class, ['only' => ['store', 'update', 'destroy']]);
        Route::apiResource('clinica-de-pagos', ClinicaDePagoController::class);
        Route::apiResource('clubes', ClubeController::class);
        Route::apiResource('jugadores', JugadoreController::class);
        Route::apiResource('usuario-trabajas', UsuarioTrabajaController::class);
        Route::apiResource('usuarios-clubs', UsuariosClubController::class);
        Route::apiResource('posiciones-jugadors', PosicionesJugadorController::class, ['only' => ['store', 'update', 'destroy']]);
    });

    // ========== SOLO JUGADORES ==========
    Route::middleware('role:jugador')->group(function () {
        Route::apiResource('jugadores', JugadoreController::class, ['only' => ['show', 'update']]);
        Route::post('jugadores/{jugadore}/foto', [JugadoreController::class, 'updatePhoto']);
        Route::get('videos/{jugadores_id}', [VideoController::class, 'index'])->where('jugadores_id', '[0-9]+');
        Route::apiResource('videos', VideoController::class, ['except' => ['index']]);
        Route::apiResource('pruebas', PruebaController::class, ['only' => ['index', 'show']]);
        Route::apiResource('pruebas-cerradas', PruebaCerradaController::class);
        Route::apiResource('fichados', FichadoController::class, ['only' => ['index', 'show']]);
        Route::apiResource('conversas', ConversaController::class);
    });

    // ========== SOLO CLUBES ==========
    Route::middleware('role:club')->group(function () {
        Route::apiResource('clubes', ClubeController::class, ['only' => ['show', 'update']]);
        Route::apiResource('pruebas', PruebaController::class, ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
        Route::apiResource('seguimiento-clubes', SeguimientoClubController::class);
        Route::apiResource('fichados', FichadoController::class, ['only' => ['index', 'show']]);
        Route::apiResource('conversas', ConversaController::class);
        Route::apiResource('usuarios-clubs', UsuariosClubController::class, ['only' => ['index', 'show']]);
    });

    // ========== ADMINISTRADOR Y JUGADORES (pueden ver/crear sus conversaciones) ==========
    Route::middleware('role:admin,jugador')->group(function () {
        // Conversas ya están en rutas anteriores
    });
});
