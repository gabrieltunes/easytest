<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    //
    protected $table = 'disciplina';
    public $timestamps = false;

    protected $fillable = [
        'descricao', 'professor_id',
    ];

    protected $guarded = [
    	'id',
    ];

    public function questao_objetivas()
    {
        return $this->hasMany('App\Questao_Objetiva');
    }

    public function questao_dissertativas()
    {
        return $this->hasMany('App\Questao_Dissertativa');
    }

    public function assuntos()
    {
        return $this->hasMany('App\Assunto');
    }

    public function professor()
    {
        return $this->belongsTo('App\Professor');
    }
}
