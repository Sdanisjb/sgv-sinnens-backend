<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisoAutrisaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_autrisa', function (Blueprint $table) {
            $table->string('placa', 8)->primary();
            $table->date('fecha_emision');
            $table->date('fecha_venc');
            $table->date('fecha_exam')->nullable();
            $table->time('hora_lev_obs')->nullable();
            $table->string('lugar_lev_obs')->nullable();
            $table->nullableTimestamps();

            $table->foreign('placa')->references('placa')->on('vehiculos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos_autrisa');
    }
}
