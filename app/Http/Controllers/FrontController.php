<?php

namespace App\Http\Controllers;

use App;
use App\Carro; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // refactor code from return view to route incluide headers in response to fix 
        // sql query filed active apenas aparecer carros active 
        $carros = Carro::where('active', 1)->orderBy('numeroReservas','desc')->get();
        $cars = Carro::where('active', 1)->orderBy('epocaBaixa','asc')->get();
        if (isset($cars) && isset($carros)) {
            return view('welcome',['cars' => $cars,'carros' => $carros]);
        } 
    }
}
