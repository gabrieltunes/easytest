<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova_Questao_Dis extends Model
{
    //
    protected $table = 'prova_questao_dis';

    public $timestamps = false;

    protected $fillable = [
        'prova_id', 'questao_dissertativa_id',
    ];

    protected $guarded = [
    	'id',
    ];
}
