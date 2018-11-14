<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questao_Dissertativa extends Model
{
    //
    protected $table = 'questao_dissertativa';
    public $timestamps = false;

    protected $fillable = [
        'materia_id', 'assunto_id', 'dificuldade', 'enunciado',
    ];

    protected $guarded = [
        'id',
    ];

    public function provas()
    {
        return $this->belongsToMany('App\Prova', 'prova_questao_dis', 'questao_dissertativa_id', 'prova_id');
    }

    public function materia()
    {
        return $this->belongsTo('App\Materia');
    }

    public function assunto()
    {
        return $this->belongsTo('App\Assunto');
    }
}
