@php
    $cars = App\Carro::all();  
    $data = date("y-m-d"); 
    $date = date('Y-m-d', strtotime($data  . ' + 1 days'));
    $dateAux = date('Y-m-d', strtotime($data  . ' + 4 days'));       
@endphp
<!DOCTYPE html translate="no">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" translate="no">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="google" content="notranslate">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="car hire, cheap car hire, car rental,  rent a car, car rentals, hire car, cheap car rentals, cheap car rental, carrentals, rent car, car hire comparison, carrental, carhire, compare car hire, car rental comparison, rentalcars, rental cars, rent a car Algarve faro">
    <meta http-equiv="description" name="description" content="Faro Car Hire in Algarve, do need to hire a car at Faro Airport in Portugal. Ask a quote and get huge on-line discounts for Algarve car hire!">
    <meta name="copyright" content="AV Rent Car, Faro Airport Car Hire">

    <title>{{ config('app.name', 'Av Rent a Car') }}</title>
    <link rel="icon" href="{{ url('/images/websiteMains/icon.png') }}">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/c19b8db1d3.js" crossorigin="anonymous"></script>
    
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/validation.js') }}" defer></script>
    <script src="{{ asset('js/dateValidation.js') }}" defer></script>
    
</head>
<body>
    <div id="app">
        <!-- Modal 01 -->
        <div class="modal fade" id="ModalBoxBasic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rates Description</h5>                
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">Basic Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Airport fees</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td>
                                    
                                </tr>
                                <tr>
                                    <td scope="row">Breakdown assistance</td>  
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td>   
                                </tr>
                                <tr>
                                    <td scope="row">Complete cover package</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td><i class="fas fa-times"></i></td> 
                                </tr>
                                <tr>
                                    <td scope="row">Collision damage waiver (cdw)</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td>  
                                </tr>
                                <tr>
                                    <td scope="row">Collision damage waiver (cdw) no Excess</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td><i class="fas fa-times"></i></td>
                                </tr>
                                <tr>
                                    <td scope="row">Tax</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td> 
                                </tr>
                                <tr>
                                    <td scope="row">Third party liability protection (tp)</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td> 
                                
                                </tr>
                                <tr>
                                    <td scope="row">Theft waiver (tw)</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td> 
                                </tr>
                                <tr>
                                    <td scope="row">Unlimited mileage</td>
                                    <td></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td> 
                                </tr>
                                <tr>
                                    <td scope="row">Young driver</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td><i class="fas fa-times"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="width:100%;" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- modal-content -->
            </div> <!-- modal-dialog -->
        </div> <!-- end Modal -->
                    <!-- Modal 02 -->
        <div class="modal fade" id="ModalBoxAllInclusive" tabindex="-1" role="dialog" aria-labelledby="ModalBoxAllInclusiveLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rates Description</h5>                
                    </div> 
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">All Inclusive</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Airport fees</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td>
                                    
                                </tr>
                                <tr>
                                    <td scope="row">Breakdown assistance</td>  
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td>  
                                </tr>
                                <tr>
                                    <td scope="row">Complete cover package</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <td scope="row">Collision damage waiver (cdw)</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td> 
                                </tr>
                                <tr>
                                    <td scope="row">Collision damage waiver (cdw) no Excess</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <td scope="row">Tax</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <td scope="row">Third party liability protection (tp)</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td>
                                
                                </tr>
                                <tr>
                                    <td scope="row">Theft waiver (tw)</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <td scope="row">Unlimited mileage</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td scope="row"><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <td scope="row">Young driver</td>
                                    <td scope="row"></td>
                                    <td scope="row"></td>
                                    <td><i class="fas fa-times"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="width:100%;" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- modal-content -->
            </div> <!-- modal-dialog -->
        </div> <!-- end Modal02 -->
        <header>
            @include('includes.nav')
        </header>
        <section aria-label="breadcrumb" style="margin-top:120px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Booking</li>
            </ol>
        </section>
          <div class="container formulario top">
            <p style="font-size:0.8rem;margin-right:10px;" class="float-right">Minimum: 3 days maximum: 30 days</p>
            <h3>Get Quote</h3>
            <div class="row">
                <div class="col-md-12">
                    <form method="get" action="{{ route('booking.index') }}" id="formulario">
                        @csrf
                        <div class="form-row form-group"> 
                            <div class="offset-md-2 col-md-2 mb-2 ">
                                <label for="pickUpDate">Pick up Date</label>
                                <input type="date" class="form-control pickUpDate @error('pickUpDate') is-invalid @enderror" name="pickUpDate" id="pickUpDate" min="<?php echo $date; ?>" value="{{ $pickUpDate ?? '' }}"required/><br/>       
                            </div>
                            @error('pickUpDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        
                            <div class="col-md-2 mb-2">
                                <label for="dropOffDate">Drop off Date </label>
                                <input type="date" class="form-control dropOffDate @error('dropOffDate') is-invalid @enderror" name="dropOffDate" id="dropOffDate" min="<?php echo $dateAux; ?>" value="{{ $dropOffDate ??'' }}" required/><br/>       
                                @error('dropOffDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                            <div class="col-md-2 mb-1">
                               <label for="age">Age:</label>
                                    <select class="form-control age @error('age') is-invalid @enderror" name="age" value="{{ old('age') ?? '' }}" id="age" required>
                                        <option selected value="23">+23</option>
                                        <option value="22">-23</option>   
                                    </select>
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="cars">Choose a Car</label>  
                                <div class="input-group">
                                    <select id="inputState" name="carros" class="form-control @error('carros') is-invalid @enderror" required>
                                    @isset($carRequest)
                                        @if($carRequest == "All Cars")
                                            <option name="carros" selected>All Cars</option>                
                                            @foreach($cars as $car)    
                                                <option value="{{ $car->id }}" name="carros">{{  $car->groupType }} {{' '}} {{  $car->marca }}</option>                                            
                                            @endforeach
                                        @else
                                            <option name="carros">All Cars</option>                
                                            @foreach($cars as $car)  
                                                @if($carRequest == $car->id)  
                                                    <option value="{{ $car->id }}" name="carros" selected>{{  $car->groupType }} {{' '}} {{  $car->marca }}</option>                                            
                                                @else
                                                    <option value="{{ $car->id }}" name="carros">{{  $car->groupType }} {{' '}} {{  $car->marca }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endisset
                                    </select>  
                                    @error('carros')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                              
                                </div>
                            </div> <!-- end col-md-3 -->       
                            <div class="col-md-1 mb-1"> 
                            <label for="cars" style="color:#F68933">hewebdeveloper</label>     
                                <div class="input-group">  
                                    <button type="submit" id="submit" class="btn btn-primary" style="width:150%">Search</button>                        
                                </div>
                            </div>       
                        </div> <!-- end form-row -->   

                    </form><!-- line end form -->
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div> <!-- end container -->       
        <main class="py-4">
            @yield('content')
        </main>

    @include('includes.footer')
    
    </div> <!-- end div app -->
</body>
</html>
