<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class JugadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $user = User::create([
            'name' => 'Emiliano',
            'email' => 'emilianorodriguezzenteno@lasallescz.edu.bo',
            'password' => Hash::make('password'),
            'telefono_usuario' => '76649422',
            'doc_identidad_usuario' => '12345678',
            'nombres' => 'Emiliano',
            'apellidos' => 'Rodriguez Zenteno',
            
        ]);
        $user->jugador()->create(['pierna_habil' => 'I','fecha_nacimiento' => '2011-04-14','altura' => '1.70','peso' => '56','descripcion_jugador' => 'Buen jugador','users_id' => $user->id ]);
    }
}
