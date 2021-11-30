<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservacionAutrisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones_autrisa', function (Blueprint $table) {
            $table->string('placa_vehiculo', 7);
            $table->string('descripcion', 255);

            $table->foreign('placa_vehiculo')->references('placa')->on('permisos_autrisa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observaciones_autrisa');
    }
}
