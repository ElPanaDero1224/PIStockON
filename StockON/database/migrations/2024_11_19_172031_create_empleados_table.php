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

            $table->id('empleadoID');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('correo',125);
            $table->string('numTelefono',20);
            $table->unsignedBigInteger('IDempresa');
            $table->unsignedBigInteger('IDcategoria');

            $table->foreign('IDempresa')->references('empresaID')->on('empresa')->onDelete('cascade');
            $table->foreign('IDcategoria')->references('categoriaID')->on('categorias')->onDelete('cascade');
            
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
