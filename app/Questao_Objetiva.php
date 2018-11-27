<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questao_Objetiva extends Model
{
    //
    protected $table = 'questao_objetiva';
    public $timestamps = false;


    protected $fillable = [
        'disciplina_id', 'assunto_id', 'professor_id', 'dificuldade', 'enunciado', 'alternativa_correta',
    ];

    protected $guarded = [
    	'id',
    ];


    public function provas()
    {
        return $this->belongsToMany('App\Prova', 'prova_questao_obj', 'questao_objetiva_id', 'prova_id');
    }

    public function alternativa()
    {
        return $this->hasOne('App\Alternativa', 'questao_objetiva_id');
    }

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }

    public function assunto()
    {
        return $this->belongsTo('App\Assunto');
    }

    public function professor()
    {
        return $this->belongsTo('App\Professor');
    }

}
