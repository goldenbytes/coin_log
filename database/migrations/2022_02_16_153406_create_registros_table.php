<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->foreignUuid('equipo_re');
            $table->dateTime('fecha_re')->nullable();
            $table->text('log_re');
            $table->float('saldo_re', 8, 2)->nullable();
            $table->dateTime('created_at');
            $table->foreign('equipo_re')->references('id_eq')->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
