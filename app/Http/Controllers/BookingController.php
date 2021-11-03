<?php

namespace App\Http\Controllers;

use App\Reserva;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::check()) {
           $query = $request->input('search');

            if (empty($request->all)) {
                $messages = Reserva::orderBy('created_at', 'desc')->paginate(8);
            } 

            if($query) {     
                $name = Reserva::where('name', 'LIKE', '%'.$query.'%');
                $email = Reserva::where('email', 'LIKE', '%'.$query.'%');
                $date = Reserva::where('created_at', 'LIKE','%'.$query.'%');
                $messages = Reserva::where('name','LIKE','%'.$query.'%')      
                ->union($name)
                ->union($email)
                ->union($date)
                ->paginate(8);
            } 
     
            if (View::exists('booking.index')) {
                return view('bookings.index', ['reservas' => $messages]);
            }  
        }
        return view('auth.login');
    }
}
