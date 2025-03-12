<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class empresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        db::table("empresa")->insert(
            [
                "nombre" => "Empresa 1",
                "correo"=> "empresa@gmail.com",
                "contrasenia"=> "1234567890",
                "numTelefono"=> "443212343",
            ]
        );
    }
}
