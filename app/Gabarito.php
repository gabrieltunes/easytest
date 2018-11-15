<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gabarito extends Model
{
    //
    protected $table = 'gabaritos';

    public $timestamps = false;

    protected $fillable = [
        'prova_id', 'numero_questao', 'resposta_correta',
    ];

    protected $guarded = [
    	'id',
    ];

    public function prova()
    {
        return $this->belongsTo('App\Prova');
    }
}
