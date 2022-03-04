<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro', function (Blueprint $table) {
            $table->id();
            $table->integer('ibsn');
            $table->integer('anio');
            $table->integer('no_pagina');
            $table->string('nombre');
            $table->text('descripcion');
            $table->bigInteger('idAutor');
            $table->bigInteger('idCategoria');
            $table->bigInteger('idEditorial');
            $table->string('url_imagen');
            $table->double('precio', 8, 2);
            $table->string('formato');
            $table->integer('existencia');
            $table->foreign('idAutor')->references('id')->on('autor');
            $table->foreign('idCategoria')->references('id')->on('categorias');
            $table->foreign('idEditorial')->references('id')->on('editorial');
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
        Schema::dropIfExists('libro');
    }
}
