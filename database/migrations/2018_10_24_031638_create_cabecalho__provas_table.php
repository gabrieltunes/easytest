<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabecalhoProvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabecalho_prova', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->string('logo')->nullable();
            $table->integer('professor_id')->unsigned();

            
            $table->foreign('professor_id')
            ->references('id')->on('professor')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cabecalho_prova');
    }
}