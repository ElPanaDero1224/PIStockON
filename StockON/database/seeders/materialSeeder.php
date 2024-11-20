<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\support\Facades\DB;

class materialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        db::table("materiales")->insert(
            [
                "nombre" => "Madera",
                "peso"=> "34.5",
                "disponibilidad"=> 1,
                "precio"=> "45.60",
                "caracteristicas"=> "Es una cosa y ya",
                "codigoLote"=> "61332112121",
                "material"=> "metal y ya",
                "IDempresa"=> 1,
                "IDproveedor"=> 1,
            ]
        );
    }
}
