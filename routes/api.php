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

    Route::apiResource('paises', PaiseController::class);
    Route::apiResource('administradores', AdministradoreController::class);
    Route::apiResource('ciudades', CiudadeController::class);
    Route::apiResource('clinica-de-pagos', ClinicaDePagoController::class);
    Route::apiResource('clubes', ClubeController::class);
    Route::apiResource('conversas', ConversaController::class);
    Route::apiResource('fichados', FichadoController::class);
    Route::apiResource('jugadores', JugadoreController::class);
    Route::apiResource('posiciones-jugadors', PosicionesJugadorController::class);
    Route::apiResource('pruebas', PruebaController::class);
    Route::apiResource('usuarios-clubs', UsuariosClubController::class);
    Route::apiResource('usuario-trabajas', UsuarioTrabajaController::class);
    Route::apiResource('videos', VideoController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
});
