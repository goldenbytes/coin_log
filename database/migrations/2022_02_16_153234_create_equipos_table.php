<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->uuid('id_eq');
            $table->string('nombre_eq');
            $table->string('serial_eq');
            $table->ipAddress('ip_eq');
            $table->foreignId('propietario_eq');
            $table->foreign('propietario_eq')->references('id_du')->on('duenos');
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
        Schema::dropIfExists('equipos');
    }
}
