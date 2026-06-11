<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\User;
use App\Models\UsuariosClub;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //crear un usuario y asignarle un club
        $user = User::create([
            'name' => 'Pepito',
            'email' => 'oriente@gmail.com',
            'password' => Hash::make('password'),
            'telefono_usuario' => '69166644',
            'doc_identidad_usuario' => '1097534',
            'nombres' => 'Alejandro',
            'apellidos' => 'Rodriguez',
            
        ]);
        //crear club y asignarle el usuario
        $club = Club::create([
            'nombre_club' => 'Oriente Petrolero',
            'link_escudo' => 'localhost/escudoOriente.png',
            'ciudad_id' => 1,
        ]);
        $usuariosClub=UsuariosClub::create([
            'users_id' => $user->id
        ]); 
    }
}
