<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestaoDissertativasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questao_dissertativa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('disciplina_id')->unsigned();
            $table->integer('assunto_id')->unsigned();
            $table->integer('professor_id')->unsigned();
            $table->string('dificuldade');
            $table->text('enunciado');
            

            $table->foreign('professor_id')
            ->references('id')->on('professor')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('disciplina_id')
            ->references('id')->on('disciplina')
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
        Schema::dropIfExists('questao_dissertativa');
    }
}
