<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'id',
        'email',
        'spainInsurance',
        'gps',
        'extraDriver',
        'todlerSeat',
        'infantSeat',
        'boosterSeat'
    ];
}
