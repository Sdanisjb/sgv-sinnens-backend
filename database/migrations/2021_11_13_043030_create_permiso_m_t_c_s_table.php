<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisoMTCSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_mtc', function (Blueprint $table) {
            $table->string('placa', 7)->primary();
            $table->date('fecha_renovacion');
            $table->date('fecha_venc');
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
        Schema::dropIfExists('permisos_mtc');
    }
}
