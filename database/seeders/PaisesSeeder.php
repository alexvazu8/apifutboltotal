<?php

namespace Database\Seeders;

use App\Models\Paise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //crear paises, quiero que sean 10 de Latinoamerica
        $paises = [
            ['nombre_pais' => 'Argentina'],
            ['nombre_pais' => 'Bolivia'],
            ['nombre_pais' => 'Brasil'],
            ['nombre_pais' => 'Chile'],
            ['nombre_pais' => 'Colombia'],
            ['nombre_pais' => 'Ecuador'],
            ['nombre_pais' => 'Paraguay'],
            ['nombre_pais' => 'Peru'],
            ['nombre_pais' => 'Uruguay'],
            ['nombre_pais' => 'Venezuela'],
            
        ];

        foreach ($paises as $pais) {
            Paise::create($pais);
        }

    }
}
