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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', 10, 2)->nullable(); // Se calcula al finalizar la compra
            $table->timestamp('fecha_realizacion')->nullable(); // Fecha de compra
            $table->enum('estado', ['pendiente', 'completado'])->default('pendiente'); // Nuevo campo
            $table->unsignedBigInteger('id_empresa');
        
            $table->foreign('id_empresa')->references('id')->on('empresa')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
