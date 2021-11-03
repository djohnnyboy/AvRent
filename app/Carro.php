<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
    'id',
    'groupType',
    'marca',
    'epocaBaixa',
    'epocaMedia',
    'epocaMediaAlta',
    'epocaAlta',
    'seguro',
    'transmissao',
    'combustivel',
    'lugares',
    'bagagemGr',
    'bagagemPq',
    'arCondicionado',
    'imagem',
    'numeroReservas',
    'active',
    'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }
}
