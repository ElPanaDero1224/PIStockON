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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id('proveedorID'); // ID del proveedor
            $table->string('nombre', 100); // Nombre del proveedor
            $table->string('correo', 100); // Correo electrónico del proveedor
            $table->string('numTelefono', 20); // Número de teléfono

            $table->string('tiposProducto', 255)->nullable(); // Tipos de productos suministrados
            $table->string('condicionesPago', 255)->nullable(); // Condiciones de pago
            $table->string('frecuenciaSuministro', 255)->nullable(); // Frecuencia de suministro
            $table->string('horarioAtencion', 255)->nullable(); // Horario de atención
            $table->string('pais', 100)->nullable(); // País
            $table->string('ciudad', 100)->nullable(); // Ciudad

            // Relación con la tabla empresa
            $table->unsignedBigInteger('IDempresa'); 
            $table->foreign('IDempresa')->references('empresaID')->on('empresa')->onDelete('cascade');

            $table->timestamps(); // Campos de timestamps (created_at y updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
