<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestaoObjetivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questao_objetiva', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('materia_id')->unsigned();
            $table->integer('assunto_id')->unsigned();
            $table->text('enunciado');
            $table->char('alternativa_correta', 1);


            $table->foreign('materia_id')
            ->references('id')->on('materia')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('assunto_id')
            ->references('id')->on('assunto')
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
        Schema::dropIfExists('questao_objetiva');
    }
}
