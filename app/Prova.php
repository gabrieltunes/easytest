<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    //
    protected $table = 'prova';


    protected $fillable = [
        'professor_id', 'cabecalho_prova_id',
    ];

    protected $guarded = [
    	'id',
    ];

 	public function professor()
    {
        return $this->belongsTo('App\Professor');
    }

    public function cabecalho_prova()
    {
        return $this->belongsTo('App\Cabecalho_Prova');
    }

    public function questao_objetivas()
    {
        return $this->belongsToMany('App\Questao_Objetiva', 'prova_questao_obj');
    }

    public function questao_dissertativas()
    {
        return $this->belongsToMany('App\Questao_Dissertativa', 'prova_questao_obj');
    }

}
