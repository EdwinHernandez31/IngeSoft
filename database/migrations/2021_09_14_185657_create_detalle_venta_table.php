<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idVenta');
            $table->bigInteger('idLibro');
            $table->integer('cantidad');
            $table->double('precio', 8, 2);
            $table->double('total', 8, 2);
            $table->foreign('idVenta')->references('id')->on('venta');
            $table->foreign('idLibro')->references('id')->on('libro');
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
        Schema::dropIfExists('detalle_venta');
    }
}
