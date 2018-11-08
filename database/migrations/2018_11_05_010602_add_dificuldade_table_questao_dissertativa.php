<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDificuldadeTableQuestaoDissertativa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questao_dissertativa', function (Blueprint $table) {
            //
            $table->string('dificuldade')
                    ->after('assunto_id'); // Ordenado após a coluna
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questao_dissertativa', function (Blueprint $table) {
            //
            $table->dropColumn('dificuldade');
        });
    }
}
