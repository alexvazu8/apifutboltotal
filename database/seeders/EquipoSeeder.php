<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipos = [

            // 🇦🇷 ARGENTINA
            ['nombre_club'=>'Boca Juniors','ciudad_id'=>1],
            ['nombre_club'=>'River Plate','ciudad_id'=>1],
            ['nombre_club'=>'San Lorenzo','ciudad_id'=>1],
            ['nombre_club'=>'Huracán','ciudad_id'=>1],
            ['nombre_club'=>'Vélez Sarsfield','ciudad_id'=>1],

            ['nombre_club'=>'Talleres','ciudad_id'=>2],
            ['nombre_club'=>'Belgrano','ciudad_id'=>2],
            ['nombre_club'=>'Instituto','ciudad_id'=>2],
            ['nombre_club'=>'Racing de Córdoba','ciudad_id'=>2],
            ['nombre_club'=>'General Paz Juniors','ciudad_id'=>2],

            ['nombre_club'=>"Newell's Old Boys",'ciudad_id'=>3],
            ['nombre_club'=>'Rosario Central','ciudad_id'=>3],
            ['nombre_club'=>'Central Córdoba (R)','ciudad_id'=>3],
            ['nombre_club'=>'Argentino de Rosario','ciudad_id'=>3],
            ['nombre_club'=>'Tiro Federal','ciudad_id'=>3],

            // 🇧🇴 BOLIVIA
            ['nombre_club'=>'Bolívar','ciudad_id'=>4],
            ['nombre_club'=>'The Strongest','ciudad_id'=>4],
            ['nombre_club'=>'Always Ready','ciudad_id'=>4],
            ['nombre_club'=>'ABB','ciudad_id'=>4],
            ['nombre_club'=>'Litoral','ciudad_id'=>4],

            ['nombre_club'=>'Oriente Petrolero','ciudad_id'=>5],
            ['nombre_club'=>'Blooming','ciudad_id'=>5],
            ['nombre_club'=>'Guabirá','ciudad_id'=>5],
            ['nombre_club'=>'Real Santa Cruz','ciudad_id'=>5],
            ['nombre_club'=>'Destroyers','ciudad_id'=>5],

            ['nombre_club'=>'Wilstermann','ciudad_id'=>6],
            ['nombre_club'=>'Aurora','ciudad_id'=>6],
            ['nombre_club'=>'Universitario de Vinto','ciudad_id'=>6],
            ['nombre_club'=>'Enrique Happ','ciudad_id'=>6],
            ['nombre_club'=>'Arauco Prado','ciudad_id'=>6],

            // 🇧🇷 BRASIL
            ['nombre_club'=>'Londrina EC','ciudad_id'=>7],
            ['nombre_club'=>'Portuguesa Londrinense','ciudad_id'=>7],
            ['nombre_club'=>'Grêmio Londrinense','ciudad_id'=>7],
            ['nombre_club'=>'Junior Team','ciudad_id'=>7],
            ['nombre_club'=>'Platinense','ciudad_id'=>7],

            ['nombre_club'=>'São Paulo FC','ciudad_id'=>8],
            ['nombre_club'=>'Corinthians','ciudad_id'=>8],
            ['nombre_club'=>'Palmeiras','ciudad_id'=>8],
            ['nombre_club'=>'Portuguesa','ciudad_id'=>8],
            ['nombre_club'=>'Juventus-SP','ciudad_id'=>8],

            ['nombre_club'=>'Santos FC','ciudad_id'=>9],
            ['nombre_club'=>'Portuguesa Santista','ciudad_id'=>9],
            ['nombre_club'=>'Jabaquara','ciudad_id'=>9],
            ['nombre_club'=>'EC São Vicente','ciudad_id'=>9],
            ['nombre_club'=>'AA Portuguesa','ciudad_id'=>9],

            ['nombre_club'=>'Flamengo','ciudad_id'=>10],
            ['nombre_club'=>'Fluminense','ciudad_id'=>10],
            ['nombre_club'=>'Vasco da Gama','ciudad_id'=>10],
            ['nombre_club'=>'Botafogo','ciudad_id'=>10],
            ['nombre_club'=>'Bangu','ciudad_id'=>10],

            ['nombre_club'=>'Brasiliense','ciudad_id'=>11],
            ['nombre_club'=>'Gama','ciudad_id'=>11],
            ['nombre_club'=>'Real Brasília','ciudad_id'=>11],
            ['nombre_club'=>'Capital FC','ciudad_id'=>11],
            ['nombre_club'=>'Ceilândia','ciudad_id'=>11],

            // 🇨🇱 CHILE
            ['nombre_club'=>'Colo-Colo','ciudad_id'=>12],
            ['nombre_club'=>'Universidad de Chile','ciudad_id'=>12],
            ['nombre_club'=>'Universidad Católica','ciudad_id'=>12],
            ['nombre_club'=>'Audax Italiano','ciudad_id'=>12],
            ['nombre_club'=>'Palestino','ciudad_id'=>12],

            ['nombre_club'=>'Santiago Wanderers','ciudad_id'=>13],
            ['nombre_club'=>'Everton','ciudad_id'=>13],
            ['nombre_club'=>'San Luis','ciudad_id'=>13],
            ['nombre_club'=>'Unión La Calera','ciudad_id'=>13],
            ['nombre_club'=>'Deportes Valparaíso','ciudad_id'=>13],

            ['nombre_club'=>'Deportes Concepción','ciudad_id'=>14],
            ['nombre_club'=>'Huachipato','ciudad_id'=>14],
            ['nombre_club'=>'Universidad de Concepción','ciudad_id'=>14],
            ['nombre_club'=>'Naval','ciudad_id'=>14],
            ['nombre_club'=>'Lota Schwager','ciudad_id'=>14],

            // 🇨🇴 COLOMBIA
            ['nombre_club'=>'Millonarios','ciudad_id'=>15],
            ['nombre_club'=>'Santa Fe','ciudad_id'=>15],
            ['nombre_club'=>'La Equidad','ciudad_id'=>15],
            ['nombre_club'=>'Fortaleza','ciudad_id'=>15],
            ['nombre_club'=>'Tigres','ciudad_id'=>15],

            ['nombre_club'=>'Atlético Nacional','ciudad_id'=>16],
            ['nombre_club'=>'Independiente Medellín','ciudad_id'=>16],
            ['nombre_club'=>'Envigado','ciudad_id'=>16],
            ['nombre_club'=>'Águilas Doradas','ciudad_id'=>16],
            ['nombre_club'=>'Leones','ciudad_id'=>16],

            ['nombre_club'=>'América de Cali','ciudad_id'=>17],
            ['nombre_club'=>'Deportivo Cali','ciudad_id'=>17],
            ['nombre_club'=>'Orsomarso','ciudad_id'=>17],
            ['nombre_club'=>'Atlético FC','ciudad_id'=>17],
            ['nombre_club'=>'Boca Juniors de Cali','ciudad_id'=>17],

            // 🇪🇨 ECUADOR
            ['nombre_club'=>'Liga de Quito','ciudad_id'=>18],
            ['nombre_club'=>'El Nacional','ciudad_id'=>18],
            ['nombre_club'=>'Aucas','ciudad_id'=>18],
            ['nombre_club'=>'Universidad Católica','ciudad_id'=>18],
            ['nombre_club'=>'Independiente del Valle','ciudad_id'=>18],

            ['nombre_club'=>'Barcelona SC','ciudad_id'=>19],
            ['nombre_club'=>'Emelec','ciudad_id'=>19],
            ['nombre_club'=>'Guayaquil City','ciudad_id'=>19],
            ['nombre_club'=>'9 de Octubre','ciudad_id'=>19],
            ['nombre_club'=>'River Ecuador','ciudad_id'=>19],

            ['nombre_club'=>'Deportivo Cuenca','ciudad_id'=>20],
            ['nombre_club'=>'Gualaceo','ciudad_id'=>20],
            ['nombre_club'=>'Atenas FC','ciudad_id'=>20],
            ['nombre_club'=>'Estrella Roja','ciudad_id'=>20],
            ['nombre_club'=>'Cuenca Juniors','ciudad_id'=>20],

            // 🇵🇾 PARAGUAY
            ['nombre_club'=>'Olimpia','ciudad_id'=>21],
            ['nombre_club'=>'Cerro Porteño','ciudad_id'=>21],
            ['nombre_club'=>'Libertad','ciudad_id'=>21],
            ['nombre_club'=>'Guaraní','ciudad_id'=>21],
            ['nombre_club'=>'Nacional','ciudad_id'=>21],

            ['nombre_club'=>'3 de Febrero','ciudad_id'=>22],
            ['nombre_club'=>'R.I. 3 Corrales','ciudad_id'=>22],
            ['nombre_club'=>'Atlético Stroessner','ciudad_id'=>22],
            ['nombre_club'=>'13 de Junio','ciudad_id'=>22],
            ['nombre_club'=>'Boquerón','ciudad_id'=>22],

            ['nombre_club'=>'Encarnación FC','ciudad_id'=>23],
            ['nombre_club'=>'22 de Septiembre','ciudad_id'=>23],
            ['nombre_club'=>'Pettirossi','ciudad_id'=>23],
            ['nombre_club'=>'Atlético Juventud','ciudad_id'=>23],
            ['nombre_club'=>'San Juan','ciudad_id'=>23],

            // 🇵🇪 PERÚ
            ['nombre_club'=>'Universitario','ciudad_id'=>24],
            ['nombre_club'=>'Alianza Lima','ciudad_id'=>24],
            ['nombre_club'=>'Sporting Cristal','ciudad_id'=>24],
            ['nombre_club'=>'Deportivo Municipal','ciudad_id'=>24],
            ['nombre_club'=>'Sport Boys','ciudad_id'=>24],

            ['nombre_club'=>'Melgar','ciudad_id'=>25],
            ['nombre_club'=>'FBC Aurora','ciudad_id'=>25],
            ['nombre_club'=>'White Star','ciudad_id'=>25],
            ['nombre_club'=>'Piérola','ciudad_id'=>25],
            ['nombre_club'=>'Sportivo Huracán','ciudad_id'=>25],

            ['nombre_club'=>'Carlos A. Mannucci','ciudad_id'=>26],
            ['nombre_club'=>'Universidad César Vallejo','ciudad_id'=>26],
            ['nombre_club'=>'Carlos Tenaud','ciudad_id'=>26],
            ['nombre_club'=>'Deportivo UPAO','ciudad_id'=>26],
            ['nombre_club'=>'Juventud Bellavista','ciudad_id'=>26],

            // 🇺🇾 URUGUAY
            ['nombre_club'=>'Peñarol','ciudad_id'=>27],
            ['nombre_club'=>'Nacional','ciudad_id'=>27],
            ['nombre_club'=>'Defensor Sporting','ciudad_id'=>27],
            ['nombre_club'=>'Danubio','ciudad_id'=>27],
            ['nombre_club'=>'Liverpool','ciudad_id'=>27],

            ['nombre_club'=>'Salto FC','ciudad_id'=>28],
            ['nombre_club'=>'Universitario Salto','ciudad_id'=>28],
            ['nombre_club'=>'Saladero','ciudad_id'=>28],
            ['nombre_club'=>'Ceibal','ciudad_id'=>28],
            ['nombre_club'=>'Ferro Carril','ciudad_id'=>28],

            ['nombre_club'=>'Paysandú FC','ciudad_id'=>29],
            ['nombre_club'=>'Bella Vista','ciudad_id'=>29],
            ['nombre_club'=>'18 de Julio','ciudad_id'=>29],
            ['nombre_club'=>'Huracán Paysandú','ciudad_id'=>29],
            ['nombre_club'=>'Independencia','ciudad_id'=>29],

            // 🇻🇪 VENEZUELA
            ['nombre_club'=>'Caracas FC','ciudad_id'=>30],
            ['nombre_club'=>'Deportivo La Guaira','ciudad_id'=>30],
            ['nombre_club'=>'Metropolitanos','ciudad_id'=>30],
            ['nombre_club'=>'Petare FC','ciudad_id'=>30],
            ['nombre_club'=>'Mineros','ciudad_id'=>30],

            ['nombre_club'=>'Zulia FC','ciudad_id'=>31],
            ['nombre_club'=>'Deportivo JBL','ciudad_id'=>31],
            ['nombre_club'=>'Rayo Zuliano','ciudad_id'=>31],
            ['nombre_club'=>'Atlético Venezuela','ciudad_id'=>31],
            ['nombre_club'=>'Titanes FC','ciudad_id'=>31],

            ['nombre_club'=>'Carabobo FC','ciudad_id'=>32],
            ['nombre_club'=>'Academia Puerto Cabello','ciudad_id'=>32],
            ['nombre_club'=>'Gran Valencia','ciudad_id'=>32],
            ['nombre_club'=>'Valencia SC','ciudad_id'=>32],
            ['nombre_club'=>'UAM','ciudad_id'=>32],
        ];


        // Agregar timestamps automáticamente
        foreach ($equipos as &$equipo) {
            $equipo['link_escudo'] = 'storage/escudos/default.png';
            $equipo['created_at'] = Carbon::now();
            $equipo['updated_at'] = Carbon::now();
        }

        DB::table('clubes')->insert($equipos);
    }
}
