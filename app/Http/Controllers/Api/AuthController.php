<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{

        /**
    * @unauthenticated
    */    
    public function register(Request $request)
    {
        // 1. Validación
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telefono_usuario' => 'required|string|max:20',
            'doc_identidad_usuario' => 'required|string|max:20',
            'nombres' => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'tipo_usuario' => 'required|in:club,admin', 
            
        ]);

        // 2. Crear usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono_usuario' => $request->telefono_usuario,
            'doc_identidad_usuario' => $request->doc_identidad_usuario,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos
        ]);

        // 🔹 Crear relación según tipo_usuario
        switch ($request->tipo_usuario) {
            case 'admin':
                $user->administrador()->create([]);
                break;


            case 'club':
                $user->usuarios_club()->create([]);
                break;
        }


        // 3. Crear token
        $token = $user->createToken('api-token')->plainTextToken;

        // Refresh token (guardado manualmente)
        $refreshToken = Str::random(64);
        $varRefresh= hash('sha256', $refreshToken);
        $user->tokens()->latest()->first()->update([
            'refresh_token' => $varRefresh,
            'expires_at' => now()->addDays(7) // refresh válido 7 días
        ]);

        // 4. Respuesta
        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'refresh_token' => $refreshToken
        ], 201);
    }

    public function registerJugador(Request $request)
    {
        // 🔹 1. Validación (todo obligatorio)
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telefono_usuario' => 'required|string|max:20',
            'doc_identidad_usuario' => 'required|string|max:20',
            'nombres' => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',

            // 🔴 Datos del jugador obligatorios
            'fecha_nacimiento' => 'required|date',
            'altura' => 'required|numeric|min:1|max:2.5',
            'peso' => 'required|numeric|min:30|max:200',
            'pierna_habil' => 'required|in:D,I',
        ]);

        // 🔹 2. Crear usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono_usuario' => $request->telefono_usuario,
            'doc_identidad_usuario' => $request->doc_identidad_usuario,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos
        ]);

        // 🔹 3. Crear jugador (SIEMPRE)
        $jugador = $user->jugador()->create([
            'fecha_nacimiento' => \Carbon\Carbon::parse($request->fecha_nacimiento)->toDateString(),
            'altura' => $request->altura,
            'peso' => $request->peso,
            'pierna_habil' => $request->pierna_habil,
        ]);

        // 🔹 4. Token
        $token = $user->createToken('jugador-token')->plainTextToken;

        // 🔹 5. Refresh token
        $refreshToken = Str::random(64);
        $varRefresh = hash('sha256', $refreshToken);

        $user->tokens()->latest()->first()->update([
            'refresh_token' => $varRefresh,
            'expires_at' => now()->addDays(7)
        ]);

        // 🔹 6. Respuesta
        return response()->json([
            'user' => $user,
            'jugador' => $jugador,
            'access_token' => $token,
            'refresh_token' => $refreshToken
        ], 201);
    }
    
    /**
    * @unauthenticated
    */
    public function login(Request $request)
    {
            // Validación
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Credenciales incorrectas'
            ], 401);
        }

        $user = Auth::user();

        $token = $user->createToken('api-token')->plainTextToken;

         // Refresh token (guardado manualmente)
        $refreshToken = Str::random(64);
        $varRefresh= hash('sha256', $refreshToken);
        $user->tokens()->latest()->first()->update([
            'refresh_token' => $varRefresh,
            'expires_at' => now()->addDays(7) // refresh válido 7 días
        ]);

        $tipo_usuario = $user->getTipoUsuario();

        return response()->json([
            'user' => $user,
            'tipo_usuario' => $tipo_usuario,
            'access_token' => $token,
            'refresh_token' => $refreshToken
        ], 200);
    }


    

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada'
        ], 200);
    }

 /*   public function refresh(Request $request)
    {
        $hashed = hash('sha256', $request->refresh_token);

        $token = PersonalAccessToken::where('refresh_token', $hashed)
            ->where('expires_at', '>', now())
            ->first();

        if (!$token) {
            return response()->json(['error' => 'Refresh token inválido'], 401);
        }

        $user = $token->tokenable;

        // eliminar token anterior
        $token->delete();

        // generar nuevo access token
        $newAccessToken = $user->createToken('access_token')->plainTextToken;

        return response()->json([
            'access_token' => $newAccessToken
        ]);
    }

    */
    /**
    * @unauthenticated
    */        

    public function refresh(Request $request)
    {
        $request->validate([
            'refresh_token' => 'required|string'
        ]); 
        $hashed = hash('sha256', $request->refresh_token);

        $token = PersonalAccessToken::where('refresh_token', $hashed)
            ->where('expires_at', '>', now())
            ->first();

        if (!$token) {
            return response()->json(['error' => 'Refresh token inválido'], 401);
        }

        $user = $token->tokenable;

        //  eliminar token anterior (IMPORTANTE)
        $token->delete();

        //  crear nuevo token
        $tokenResult = $user->createToken('access_token');

        $accessToken = $tokenResult->plainTextToken;
        $tokenModel = $tokenResult->accessToken;

        //  nuevo refresh token
        $newRefreshToken = Str::random(64);

        $tokenModel->refresh_token = hash('sha256', $newRefreshToken);
        $tokenModel->expires_at = now()->addDays(7);
        $tokenModel->save();

        return response()->json([
            'access_token' => $accessToken,
            'refresh_token' => $newRefreshToken
        ]);
    }        
}
