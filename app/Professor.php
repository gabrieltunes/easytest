<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
    protected $table = 'professor';

    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $guarded = [
    	'id',
    ];

	/**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cabecalho_provas()
    {
        return $this->hasMany('App\Cabecalho_Prova');
    }

    public function provas()
    {
        return $this->hasMany('App\Prova');
    }
}
    