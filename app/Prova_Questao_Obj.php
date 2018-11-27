<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova_Questao_Obj extends Model
{
    //
    protected $table = 'prova_questao_obj';

    public $timestamps = false;

    protected $fillable = [
        'prova_id', 'questao_objetiva_id',
    ];

    protected $guarded = [
    	'id',
    ];


}
