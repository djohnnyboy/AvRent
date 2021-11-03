<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {

            $query = $request->input('search');

            if (empty($request->all)) {
                $messages = Contact::orderBy('created_at', 'desc')->paginate(8);
            } 

            if($query) {     
                $name = Contact::where('name', 'LIKE', '%'.$query.'%');
                $email = Contact::where('email', 'LIKE', '%'.$query.'%');
                $date = Contact::where('created_at', 'LIKE','%'.$query.'%');
                $messages = Contact::where('name','LIKE','%'.$query.'%')      
                ->union($name)
                ->union($email)
                ->union($date)
                ->paginate(8);
            } 
     
            if (View::exists('booking.index')) {
                return view('messages.index', ['messages' => $messages]);
            }         
        }
        return view('auth.login');
    }
}
