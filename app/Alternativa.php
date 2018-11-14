<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternativa extends Model
{
    //
	protected $table = 'alternativas';
    public $timestamps = false;

    protected $fillable = [
        'questao_objetiva_id', 'alternativa_a', 'alternativa_b', 'alternativa_c',
        'alternativa_d', 'alternativa_e',
    ];

    protected $guarded = [
    	'id',
    ];

    public function questao_objetiva()
    {
        return $this->belongsTo('App\Questao_Objetiva', 'questao_objetiva_id');
    }
}
