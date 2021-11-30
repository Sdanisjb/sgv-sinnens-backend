<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_mantenimiento', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('placa_vehiculo', 7);
            $table->date('fecha_emision');
            $table->date('fecha_salida');
            $table->string('nombre_taller', 30);
            $table->unsignedBigInteger('km_actual')->nullable();
            $table->string('nro_factura', 10);
            $table->string('nro_proforma', 10)->nullable();

            $table->foreign('placa_vehiculo')->references('placa')->on('vehiculos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros_mantenimiento');
    }
}
