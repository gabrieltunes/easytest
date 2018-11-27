<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questao_Dissertativa extends Model
{
    //
    protected $table = 'questao_dissertativa';
    public $timestamps = false;

    protected $fillable = [
        'disciplina_id', 'assunto_id', 'professor_id', 'dificuldade', 'enunciado',
    ];

    protected $guarded = [
        'id',
    ];

    public function provas()
    {
        return $this->belongsToMany('App\Prova', 'prova_questao_dis', 'questao_dissertativa_id', 'prova_id');
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
