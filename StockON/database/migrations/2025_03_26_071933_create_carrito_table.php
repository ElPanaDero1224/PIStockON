<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id'); 
            $table->integer('cantidad'); 
            $table->decimal('precio', 10, 2); 
            $table->decimal('precioTotal', 10, 2); 
            $table->timestamp('fecha')->useCurrent(); 
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('carritos');
    }
};
