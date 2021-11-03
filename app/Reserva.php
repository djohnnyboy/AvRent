<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'id',
        'visitor',
        'device',
        'name',
        'email',
        'phone',
        'dateOfBirth',
        'drivinglicence',   
        'pickUpPlace',
        'dropOffDate',
        'dropOffTime',
        'dropOffPlace',
        'pickUpDate',
        'pickUpTime',
        'flightNumber',
        'fullInsurance',
        'spainInsurance',
        'gps',
        'extraDriver',
        'childTodlerSeats',
        'childInfantSeats',
        'childBoosterSeats',
        'textArea',
        'age',
        'body',
        'termsAndConditions',
        'preco',
        'paymentId',
        'commission',
        'car_id',
        'quote_id',
    ];

    public function carros(){
        return $this->belongsTo('App\Carro');
    }

    public function quotes(){
        return $this->belongsTo('App\Quote');
    }
}
