<?php

namespace App\Http\Controllers;

use App\Quote;
use App\Carro;
use Validator;
use Carbon\Carbon;
use App\Library\Precos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Http\Requests\QuotesRequest;
use Illuminate\Support\Facades\Storage;

class QuoteController extends Controller
{
    protected $start;
    protected $end;  
    protected $epMedia;
    protected $epAlta;
    protected $epMediaAlta;
    protected $epBaixa;

    public function __construct(){
        $this->epMedia = 0;
        $this->epAlta = 0;
        $this->epMediaAlta = 0;
        $this->epBaixa = 0;
    }
    public function index(QuotesRequest $request){

        if(empty($request->all())){
            return redirect('/');
        }else{
            $this->start = $request->input('pickUpDate');
            $this->end = $request->input('dropOffDate');
            $this->requestCarros = $request->input('carros');
           
            $date = Carbon::now();   
            $diasQuote = new Precos();
            $diasQuote->quotePeriod($this->start, $this->end);
            $dias = explode(" ", $diasQuote->quotePeriod($this->start, $this->end));
           
            if($dias[0] == "epocaMedia"){
                $this->epMedia = $dias[1];
            }elseif($dias[0] == "epocaAlta"){
                $this->epAlta = $dias[1];
            }elseif($dias[0] == "epocaMediaAlta"){
                $this->epMediaAlta = $dias[1];
            }else{
                $this->epBaixa = $dias[1];
            }

            if (strtotime($this->start) <= strtotime($this->end)) {
                if ($this->start >= $date) {
                    if ($this->requestCarros == 'All Cars') {
                        $quotes = Quote::create([
                        'pickUpDate' => $request->input('pickUpDate'),
                        'dropOffDate' => $request->input('dropOffDate'),
                        'carros' => $request->input('carros'),
                        'age' => $request->input('age'),
                        'days' => $dias[1],          
                        ]);
                        if ($quotes) {
                            $cars = DB::table('carros')->orderBy('epocaBaixa','asc')->get();
                            if ($cars) {
                                if (View::exists('booking.index')) {
                                    return view('booking.index', [ 
                                        'carros' => $cars, 
                                        'quote' => $quotes->id,
                                        'pickUpDate' => $this->start, 
                                        'dropOffDate' => $this->end, 
                                        'carRequest' => $this->requestCarros,     
                                        'epMedia' => $this->epMedia,  
                                        'epAlta' => $this->epAlta,  
                                        'epMediaAlta' => $this->epMediaAlta,   
                                        'epBaixa' => $this->epBaixa, 
                                        'pickUpPoint' => $quotes->pickUpPoint,
                                        'returnDropPoint' => $quotes->returnDropPoint,                      
                                        ]);
                                }
                            }
                        }             
                    }else{
                        // code below is a query for one car at a time
                        $quotes = Quote::create([
                        'pickUpDate' => $request->input('pickUpDate'),
                        'dropOffDate' => $request->input('dropOffDate'),
                        'carros' => $request->input('carros'),
                        'age' => $request->input('age'),
                        'days' => $dias[1],
                        'car_id' => $this->requestCarros         
                        ]);
                        $cars = Carro::findOrFail($this->requestCarros);
                        if ($cars && $quotes) {
                            if (View::exists('booking.show')) {
                                return view('booking.show', [
                                    'carro' => $cars, 
                                    'quote' => $quotes->id,
                                    'pickUpDate' => $this->start, 
                                    'dropOffDate' => $this->end, 
                                    'carRequest' => $this->requestCarros,
                                    'epMedia' => $this->epMedia,  
                                    'epAlta' => $this->epAlta,  
                                    'epMediaAlta' => $this->epMediaAlta, 
                                    'epBaixa' => $this->epBaixa, 
                                    ]);
                            }
                        }
                    }
                }else{
                    return redirect('/');
                }
            }
            
        }
    }

} 
