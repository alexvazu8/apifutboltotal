<?php

namespace Database\Seeders;

use App\Models\Ciudade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //crear ciudades, quiero que sean el mayor numero posible de todos los paices que creaste antes
        $ciudades = [
            ['nombre_ciudad' => 'Buenos Aires', 'pais_id' => 1],
            ['nombre_ciudad' => 'Córdoba', 'pais_id' => 1],
            ['nombre_ciudad' => 'Rosario', 'pais_id' => 1],
            ['nombre_ciudad' => 'La Paz', 'pais_id' => 2],
            ['nombre_ciudad' => 'Santa Cruz', 'pais_id' => 2],
            ['nombre_ciudad' => 'Cochabamba', 'pais_id' => 2],
            ['nombre_ciudad' => 'Londrina', 'pais_id' => 3],
            ['nombre_ciudad' => 'São Paulo', 'pais_id' => 3],
            ['nombre_ciudad' => 'Santos', 'pais_id' => 3],
            ['nombre_ciudad' => 'Rio de Janeiro', 'pais_id' => 3],
            ['nombre_ciudad' => 'Brasilia', 'pais_id' => 3],
            ['nombre_ciudad' => 'Santiago', 'pais_id' => 4],
            ['nombre_ciudad' => 'Valparaíso', 'pais_id' => 4],
            ['nombre_ciudad' => 'Concepción', 'pais_id' => 4],
            ['nombre_ciudad' => 'Bogotá', 'pais_id' => 5],
            ['nombre_ciudad' => 'Medellín', 'pais_id' => 5],
            ['nombre_ciudad' => 'Cali', 'pais_id' => 5],
            ['nombre_ciudad' => 'Quito', 'pais_id' => 6],
            ['nombre_ciudad' => 'Guayaquil', 'pais_id' => 6],
            ['nombre_ciudad' => 'Cuenca', 'pais_id' => 6],
            ['nombre_ciudad' => 'Asunción', 'pais_id' => 7],
            ['nombre_ciudad' => 'Ciudad del Este', 'pais_id' => 7],
            ['nombre_ciudad' => 'Encarnación', 'pais_id' => 7],
            ['nombre_ciudad' => 'Lima', 'pais_id' => 8],
            ['nombre_ciudad' => 'Arequipa', 'pais_id' => 8],
            ['nombre_ciudad' => 'Trujillo', 'pais_id' => 8],
            ['nombre_ciudad' => 'Montevideo', 'pais_id' => 9],
            ['nombre_ciudad' => 'Salto', 'pais_id' => 9],
            ['nombre_ciudad' => 'Paysandú', 'pais_id' => 9],
            ['nombre_ciudad' => 'Caracas', 'pais_id' => 10],
            ['nombre_ciudad' => 'Maracaibo', 'pais_id' => 10],
            ['nombre_ciudad' => 'Valencia', 'pais_id' => 10],
        ];
        foreach ($ciudades as $ciudad) {
            Ciudade::updateOrCreate(
                [
                    'nombre_ciudad' => $ciudad['nombre_ciudad']
                ],
                [
                    'nombre_ciudad' => $ciudad['nombre_ciudad'],
                    'pais_id' => $ciudad['pais_id']
                ]
            );
        }
    }
}
