<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prova', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('professor_id')->unsigned();
            $table->integer('cabecalho_prova_id')->unsigned();

            $table->foreign('professor_id')
            ->references('id')->on('professor')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('cabecalho_prova_id')
            ->references('id')->on('cabecalho_prova')
            ->onDelete('cascade')
            ->onUpdate('cascade');



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
        Schema::dropIfExists('prova');
    }
}
