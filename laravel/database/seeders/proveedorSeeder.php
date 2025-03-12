<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\support\Facades\DB;

class proveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        db::table("proveedores")->insert(
            [
                "nombre"=> "CAT",
                "correo"=> "CAT@gmail.com",
                "numTelefono"=> "34533232443",
                "IDempresa"=> 1,

            ]
        );
    }
}
