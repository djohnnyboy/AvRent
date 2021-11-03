<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable =  [
        'id',
        'pickUpDate',
        'dropOffDate',
        'age',
        'carros',
        'days',
        'car_id'
    ];

    public function carro(){
        return $this->belongsTo('App\Carro');
    }
}
