<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    //
    protected $table = 'materia';
    public $timestamps = false;

    protected $fillable = [
        'descricao',
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
}
