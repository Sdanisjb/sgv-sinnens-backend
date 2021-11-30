<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObervacionMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones_mantenimiento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_registro');
            $table->string('descripcion', 255);

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
        Schema::dropIfExists('observaciones_mantenimiento');
    }
}
