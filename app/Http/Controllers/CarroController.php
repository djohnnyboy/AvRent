<?php

namespace App\Http\Controllers;

use Image;
use App\Carro;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\CarroRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\NotReadableException;

class CarroController extends Controller
{
    public function index()
    {
        if (Auth::check() ) {
            $cars = Carro::where('user_id', Auth::user()->id)->get();
            if (View::exists('carros.index')) {
                return view('carros.index', ['carro' => $cars]);
            }
        }
        return view('auth.login');
    }

    public function create()
    {
        if (Auth::check() ) {
            if (View::exists('carros.create')) {
                return view('carros.create');
            }   
        }
        return view('auth.login');
    }

    public function store(CarroRequest $request)
    {
        if (Auth::check() ) {     
            if ($request->hasFile('imagem')) {
                $image = Image::make($request->file('imagem'));
                $image->resize(240,180);
                if (!Storage::exists('public/cars/')) {
                    Storage::makeDirectory('public/cars/', 0775, true);
                }
                $time = time();
                $image->save(storage_path('app/public/cars/' . $time . $request->file('imagem')->getClientOriginalName()), 60, 'png');
                $carro = Carro::create([
                    'groupType' => $request->input('groupType'),
                    'marca' => $request->input('marca'),
                    'epocaBaixa' => $request->input('epocaBaixa'),
                    'epocaMedia' => $request->input('epocaMedia'),
                    'epocaMediaAlta' => $request->input('epocaMediaAlta'),
                    'epocaAlta' => $request->input('epocaAlta'),
                    'seguro' => $request->input('seguro'),
                    'transmissao' => $request->input('transmissao'),
                    'lugares' => $request->input('lugares'),
                    'bagagemGr' => $request->input('bagagemGr'),
                    'bagagemPq' => $request->input('bagagemPq'),
                    'combustivel' => $request->input('combustivel'),
                    'arCondicionado' => $request->input('arCondicionado'),
                    'imagem' => 'cars/' . $time . $request->file('imagem')->getClientOriginalName(),
                    'numeroReservas' => 0,
                    'active' => $request->input('active'),
                    'user_id' => Auth::user()->id,
                ]);
            }
            if ($carro) {
                if (View::exists('carros.show')) {
                    return redirect()->route('carros.show', ['carro' => $carro->id])
                                ->with('success', 'Car was created succesfully');
                }           
            }   
            return back()->withInput()->with('errors', 'Error creatting new Car');  
                
        }  
        return view('auth.login');  
    }

    public function show(Request $request, Carro $carro)
    {
        if (Auth::check() ) {  
            $car = Carro::findOrFail($carro->id);
            $quotesMes = array();
            $ano = "20".date('y');
            $query = $request->input('ano');
            if($query == ''){       
                for ($i=1; $i <= 12; $i++) { 
                    $quotes = DB::table('quotes')->whereMonth('pickUpDate',$i)
                                ->whereYear('pickUpDate',$ano)->where('car_id',$car->id)->count();   
                    $quotesMes[$i] = $quotes;    
                }
                $reservasMes = array();
                $priceMes = array();
                for ($i=1; $i <= 12; $i++) { 
                    $reservas = DB::table('reservas')->whereMonth('pickUpDate',$i)
                                    ->whereYear('pickUpDate',$ano)->where('car_id', $car->id)->count(); 
                    $price = DB::table('reservas')->where('car_id',$car->id)
                                    ->whereYear('pickUpDate',$ano)->whereMonth('pickUpDate',$i)->sum('preco');
                    $reservasMes[$i] = $reservas; 
                    $priceMes[$i] = $price;    
                } 
                if (View::exists('carros.show')) {
                    return view('carros.show', ['carro' => $car,'quotesMes' => $quotesMes, 
                                    'reservasMes' => $reservasMes, 'priceMes' => $priceMes]);
                }   
            }else{
                for ($i=1; $i <= 12; $i++) { 
                    $quotes = DB::table('quotes')->whereMonth('pickUpDate',$i)
                                    ->whereYear('pickUpDate',$query)->where('car_id',$car->id)->count();   
                    $quotesMes[$i] = $quotes;    
                }
                $reservasMes = array();
                $priceMes = array();
                for ($i=1; $i <= 12; $i++) { 
                    $reservas = DB::table('reservas')->whereMonth('pickUpDate',$i)
                                    ->whereYear('pickUpDate',$query)->where('car_id', $car->id)->count(); 
                    $price = DB::table('reservas')->where('car_id',$car->id)
                                    ->whereYear('pickUpDate',$query)->whereMonth('pickUpDate',$i)->sum('preco');
                    $reservasMes[$i] = $reservas; 
                    $priceMes[$i] = $price;    
                } 
                if (View::exists('carros.show')) {
                    return view('carros.show', [
                            'carro' => $car,
                            'quotesMes' => $quotesMes, 
                            'reservasMes' => $reservasMes, 
                            'priceMes' => $priceMes]);
                } 
            }
        }
        return view('auth.login');
    }

    public function edit(Carro $carro)
    {
        if (Auth::check() ) {   
            $car = Carro::findOrFail($carro->id);
            if (View::exists('carros.edit')) {
                return view('carros.edit', 
                    ['carro' => $car,])
                    ->with('success','Carro pode ser editado!!');
            }
        }
        return view('auth.login');
    }

    public function update(CarroRequest $request, Carro $carro)
    {
        if (Auth::check() ) {
            
            $carsUpdate = Carro::where('id', $carro->id)
                ->update([
                    'groupType' => $request->input('groupType'),
                    'marca' => $request->input('marca'),
                    'epocaBaixa' => $request->input('epocaBaixa'),
                    'epocaMedia' => $request->input('epocaMedia'),
                    'epocaMediaAlta' => $request->input('epocaMediaAlta'),
                    'epocaAlta' => $request->input('epocaAlta'),
                    'seguro' => $request->input('seguro'),
                    'transmissao' => $request->input('transmissao'),
                    'lugares' => $request->input('lugares'),
                    'bagagemGr' => $request->input('bagagemGr'),
                    'bagagemPq' => $request->input('bagagemPq'),
                    'combustivel' => $request->input('combustivel'),
                    'arCondicionado' => $request->input('arCondicionado'),  
                    'active' => $request->input('active'),                   
                            ]);   
            if ($request->hasFile('imagem')) {
                $filename = $request->file('imagem');
                $image_resize = Image::make($filename)->resize(274,165)->save($filename);
                $path = $request->file('imagem')->store('public/carros');        
                $carsUpdate = Carro::where('id', $carro->id)
                                ->update([
                                    'imagem' => $path
                                ]);                   
            }                                  
            if ($carsUpdate) {
                if (View::exists('carros.show')) {
                    return redirect()->route('carros.show', ['carro' => $carro->id])
                        ->with('success','Car succesfully updated');
                }
            }        
            return back()->withInput()->with('errors', 'Carro nao fez update');
        }
        return view('auth.login'); 
    }

    public function destroy(Carro $carro)
    {
        if (Auth::check() ) { 
            $car = Carro::findOrFail($carro->id);
            if ($carro->delete()) {
                if (View::exists('carros.index')) {
                    return redirect()->route('carros.index')
                        ->with('success','Car deleted with success');
                }       
            }
            return back()->withInput()->with('errors', 'Car could not be deleted');
        }
        return view('auth.login'); 
    }
}

