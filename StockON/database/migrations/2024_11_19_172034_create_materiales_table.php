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
        Schema::create('materiales', function (Blueprint $table) {
            $table->id('materialID'); // Llave primaria
            $table->string('nombre', 100); // Nombre del producto
            $table->float('peso', 5, 2); // Peso del producto
            $table->boolean('disponibilidad')->default(true); // Disponibilidad del producto
            $table->float('precio', 10, 2); // Precio del producto
            $table->longtext('caracteristicas'); // Características del producto
            $table->string('codigoLote'); // Código del lote
            $table->longtext('material'); // Material del producto

            // Dimensiones
            $table->float('ancho', 8, 2)->nullable(); // Ancho del producto
            $table->float('largo', 8, 2)->nullable(); // Largo del producto
            $table->float('alto', 8, 2)->nullable(); // Alto del producto

            $table->string('precaucion', 255)->nullable(); // Medidas de precaución
            $table->string('fabricante', 255)->nullable(); // Fabricante del producto

            // Relaciones
            $table->unsignedBigInteger('IDempresa'); // Llave foránea hacia `empresa`
            $table->unsignedBigInteger('IDproveedor'); // Llave foránea hacia `proveedores`

            // Referencias de claves foráneas
            $table->foreign('IDempresa')->references('empresaID')->on('empresa')->onDelete('cascade');
            $table->foreign('IDproveedor')->references('proveedorID')->on('proveedores')->onDelete('cascade');

            $table->timestamps(); // Timestamps automáticos
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};
