<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGabaritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gabaritos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prova_id')->unsigned();
            $table->integer('numero_questao');
            $table->char('resposta_correta', 1);


            $table->foreign('prova_id')
            ->references('id')->on('prova')
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
        Schema::dropIfExists('gabaritos');
    }
}
