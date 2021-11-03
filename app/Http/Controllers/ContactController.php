<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use Validator;
use App\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        if (View::exists('contacts.index')) {
            return view('contacts.index');
        }   
    }
    
    public function store(ContactRequest $request,Contact $contact){

        $contacts = Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        if ($contacts) {
            
            $data = [
                'name'      => $request->input('name'),
                'message'   => $request->input('message'),
                'email'     => $request->input('email'),
                'subject'   => 'Atlantic hotels',
                'from'      => 'from@example.com',
                'from_name' => 'Av rent a car - domain',
            ];
            $user = User::findOrFail(1);
            Mail::to($user->email, 'Chappie')->send(new ContactMail($data));

            $data = [
                'name'      => $request->input('name'),
                'message'   => $request->input('message'),
                'email'     => $request->input('email'),
                'subject'   => 'Atlantic hotels',
                'from'      => 'from@example.com',
                'from_name' => 'Av Rent a Car - domain',
            ];

            Mail::to($request->input('email'), 'Chappie')->send(new ContactMail($data));

            if (View::exists('contacts.show')) {
                return redirect()->route('contacts.show',
                                        ['token' => Str::random(254),
                                            'contact' => $contacts]);
            }
        }
        return back()->withInput()->with('errors', 'Error sending message.');
    }

    public function show(Contact $contact){
        if (View::exists('contacts.show')) {
            $contacts = Contact::findOrFail($contact->id);
            return view('contacts.show',['contact' => $contacts]);
        }
    }
}
