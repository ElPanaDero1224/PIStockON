<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\support\Facades\DB;

class empleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        db::table("empleados")->insert(
            [
                "nombre"=> "Juan",
                "apellido"=> "Velazquez",
                "correo"=> "Juan@gmail.com",
                "numTelefono"=> "6773632673",
                "IDempresa"=> "1",
                "IDcategoria"=> "1",
            ]
        );
    }
}
