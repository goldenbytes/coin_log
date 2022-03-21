<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComandosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comandos', function (Blueprint $table) {
            $table->uuid('id_co')->primary();
            $table->foreignUuid('equipo_co');
            $table->string('comando_co',20);
            $table->text('salida_co')->nullable();
            $table->boolean('exito_co')->default(false);
            $table->foreign('equipo_co')->references('id_eq')->on('equipos');
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
        Schema::dropIfExists('comandos', function(Blueprint $table){
            $table->dropForeign(['equipo_co']);
        });
    }
}
