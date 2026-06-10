<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuarioTest extends TestCase
{   
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
    public function test_usuario_se_guarda()
    {
        $response = $this->post('/api/register', [
            'name' => 'Alejandro',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'telefono_usuario' => '1234567890',
            'doc_identidad_usuario' => '1097534',
            'nombres' => 'Alejandro',
            'apellidos' => 'Gomez',
            'tipo_usuario' => 'club'

        ]);
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'email' => 'test@test.com'
        ]);
    }
}
