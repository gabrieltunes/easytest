<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabecalho_Prova extends Model
{
    //
    protected $table = 'cabecalho_prova';

    public $timestamps = false;

    protected $fillable = [
        'nome', 'logo', 'professor_id',
    ];

    protected $guarded = [
    	'id',
    ];

    public function provas()
    {
        return $this->hasMany('App\Prova');
    }

    public function professor()
    {
        return $this->belongsTo('App\Professor');
    }
}
