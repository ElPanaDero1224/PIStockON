<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('correo', 125);
            $table->string('telefono', 20);
            $table->string('horario', 150)->nullable();
            $table->string('genero', 100);
            $table->string('area', 150);
            $table->decimal('salario', 12, 2);
            $table->string('contrasenia', 200);
            $table->unsignedBigInteger('id_empresa');
            $table->unsignedBigInteger('id_puesto');
    
            // Definición de claves foráneas
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            $table->foreign('id_puesto')->references('id')->on('puestos')->onDelete('cascade');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
