<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_mantenimiento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_registro');
            $table->string('descripcion', 255);
            $table->unsignedBigInteger('monto');

            $table->foreign('id_registro')->references('id')->on('registros_mantenimiento')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_mantenimiento');
    }
}
