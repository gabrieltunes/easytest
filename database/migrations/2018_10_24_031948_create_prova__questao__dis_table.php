<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvaQuestaoDisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prova_questao_dis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prova_id')->unsigned();
            $table->integer('questao_dissertativa_id')->unsigned();
            $table->integer('numero_questao');

            $table->foreign('prova_id')
            ->references('id')->on('prova')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('questao_dissertativa_id')
            ->references('id')->on('questao_dissertativa')
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
        Schema::dropIfExists('prova_questao_dis');
    }
}
