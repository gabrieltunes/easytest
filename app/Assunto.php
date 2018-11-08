<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    //
    protected $table = 'assunto';
    public $timestamps = false;

    protected $fillable = [
        'descricao', 'materia_id',
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

    public function materia()
    {
        return $this->belongsTo('App\Materia');
    }
}
