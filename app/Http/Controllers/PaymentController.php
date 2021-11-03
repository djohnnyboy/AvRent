<?php

namespace App\Http\Controllers;

use Mail;
use App\Reserva;
use App\Payment;
use App\Carro;
use App\Mail\BookingMail;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    public function __construct(){
        $this->reserva = new Reserva();
        $this->carro = new Carro();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        if ($request->session()->has('access')) {
            return view('payment.index'); 
        } else{     
            $request->session()->forget('access');
            return view('payment.show'); 
        }       
    }

    public function store(Request $request){
        Mail::to($request->input('userEmail'), 'Chappie')->send(new BookingMail($request->session()->get('dataUser')));
        Mail::to($request->input('adminEmail'), 'Chappie')->send(new BookingMail($request->session()->get('dataUser')));
        Mail::to($request->input('carOwnerEmail'), 'Chappie')->send(new BookingMail($request->session()->get('dataUser')));
        $request->session()->forget('dataUser');
        $request->session()->forget('access');
        return view('payment.success'); 
    }

}
