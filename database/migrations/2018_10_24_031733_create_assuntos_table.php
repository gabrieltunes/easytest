<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assunto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao')->unique();
            $table->integer('disciplina_id')->unsigned();
            $table->integer('professor_id')->unsigned();

            $table->foreign('professor_id')
            ->references('id')->on('professor')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('disciplina_id')
            ->references('id')->on('disciplina')
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
        Schema::dropIfExists('assunto');
    }
}
