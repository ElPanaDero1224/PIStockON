<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(empresaSeeder::class);
        $this->call(categoriaSeeder::class);
        $this->call(proveedorSeeder::class);
        $this->call(empleadoSeeder::class);

    }
}
