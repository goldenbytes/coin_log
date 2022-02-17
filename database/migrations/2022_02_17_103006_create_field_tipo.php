<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_equipo', function (Blueprint $table) {
            $table->unsignedBigInteger('plan_pe');
            $table->foreignUuid('equipo_pe');
            $table->timestamps();
            $table->foreign('equipo_pe')->references('id_eq')->on('equipos');
            $table->foreign('plan_pe')->references('id_pl')->on('planes');
            $table->primary(['plan_pe', 'equipo_pe']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_equipo', function(Blueprint $table){
            $table->dropForeign(['equipo_pe','plan_pe']);
        });
    }
}
