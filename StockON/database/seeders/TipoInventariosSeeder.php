<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoInventariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_inventarios')->insert([
            [
                'nombre' => 'Ventas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Compras',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
