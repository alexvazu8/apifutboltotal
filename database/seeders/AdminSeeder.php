<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Aquí puedes agregar la lógica para crear un usuario administrador
        // Por ejemplo, puedes usar el modelo User para crear un nuevo usuario con privilegios de administrador
        $user = User::create([
            'name' => 'admin',
            'email' => 'alexvazu@gmail.com',
            'password' => Hash::make('password'),
            'telefono_usuario' => '69166644',
            'doc_identidad_usuario' => '12345678',
            'nombres' => 'Alejandro',
            'apellidos' => 'Rodriguez',
            
        ]);
        $user->administradores()->create(['users_id' => $user->id ]);
    }
}
