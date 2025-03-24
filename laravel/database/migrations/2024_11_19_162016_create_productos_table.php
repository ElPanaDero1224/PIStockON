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
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 100);
        $table->decimal('precioUnitario', 10, 2); // Número con 2 decimales
        $table->text('dimensiones')->nullable(); // Texto largo, permite nulo
        $table->text('precauciones')->nullable(); // Texto largo, permite nulo
        $table->integer('cantidad'); // Número entero
        $table->text('caracteristicas')->nullable(); // Texto largo, permite nulo
        $table->string('codigoLote', 200);
        $table->text('material')->nullable(); // Texto largo, permite nulo
        $table->unsignedBigInteger('id_inventario');

        $table->foreign('id_inventario')->references('id')->on('inventarios')->onDelete('cascade');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
