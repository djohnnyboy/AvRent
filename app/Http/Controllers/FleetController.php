<?php

namespace App\Http\Controllers;

use App\Carro; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FleetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Carro::where('active', 1)->orderBy('epocaBaixa','asc')->get();
        if (View::exists('rent-a-car-fleet.index')) {
            return view('rent-a-car-fleet.index',['cars' => $cars]);
        }   
    }

}
