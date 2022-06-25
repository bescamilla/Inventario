<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable();
            $table->string('nombre')->nullable();
            $table->foreignId('id_categoria')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
            $table->string('descripcion')->nullable();
            $table->double('precio',10,2);
            $table->integer('cantidad')->nullable();
            $table->enum('estado', ['Si', 'No'])->default('Si');
            $table->enum('eliminado', ['Si', 'No'])->default('No');
            $table->string('imagen')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
