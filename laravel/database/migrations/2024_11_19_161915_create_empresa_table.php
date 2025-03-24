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
        Schema::create('empresa', function (Blueprint $table) {
            $table->id('id');
            $table->string('numeroRegistro', 14);
            $table->string('nombre', 255);
            $table->string('tipo', 255);
            $table->string('correo', 255);
            $table->string('contrasenia',255);
            $table->string('numTelefono',20);
            $table->string('pais', 50);
            $table->string('region', 50);
            $table->string('direccion', 300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresa');
    }
};
