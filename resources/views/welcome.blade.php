@php
    $data = date("y-m-d"); 
    $date = date('Y-m-d', strtotime($data  . ' + 1 days'));
    $dateAux = date('Y-m-d', strtotime($data  . ' + 4 days'));
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="keywords" content="car hire, cheap car hire, car rental,  rent a car, car rentals, hire car, cheap car rentals, cheap car rental, car rentals, rent car, car hire comparison, carrental, carhire, compare car hire, car rental comparison, rentalcars, rental cars, rent a car Algarve faro">
        <meta http-equiv="description" name="description" content="Faro Car Hire in Algarve, do need to hire a car at Faro Airport in Portugal. Ask a quote and get huge on-line discounts for Algarve car hire!">
        <meta name="copyright" content="AV Rent Car, Faro Airport Car Hire">
        <title>{{ config('app.name','Rent-a-Car') }}</title>
        <link rel="icon" href="{{ url('/images/websiteMains/icon.png') }}">
        <style>
            body div {
            -webkit-animation: fadein 3s; /* Safari, Chrome and Opera > 12.1 */
            -moz-animation: fadein 3s; /* Firefox < 16 */
                -ms-animation: fadein 3s; /* Internet Explorer */ 
                -o-animation: fadein 3s; /* Opera < 12.1 */
                    animation: fadein 3s;
            }

            @keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Firefox < 16 */
            @-moz-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Safari, Chrome and Opera > 12.1 */
            @-webkit-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }

            /* Internet Explorer */
            @-ms-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }
            
            /* Opera < 12.1 */
            @-o-keyframes fadein {
                from { opacity: 0; }
                to   { opacity: 1; }
            }             
        </style>
        <!-- cdn has faster loading time of the page depending on the cdn server location -->
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
        <!-- icon Link -->
           
        <!-- Scripts -->
        <!-- javascript external files making the code rendering faster and easier for the machinnes -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/validation.js') }}" defer></script>
        <script src="{{ asset('js/cookie.js') }}" defer></script>
        <script src="{{ asset('js/dateValidation.js') }}" defer></script>
        <script src="{{ asset('js/spinner.js') }}" defer></script>
    </head>
    <body>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('welcome.RatesDescription') </h5>                
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">@lang('welcome.BasicRate')</th>
                                <th scope="col">@lang('welcome.AllInclusive')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="modalTh">
                                    <td scope="row" >@lang('welcome.AirportFees')</td>
                                    <td></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                    
                                </tr>
                                <tr>
                                    <td scope="row">@lang('welcome.BreakdownAssistance')</td>  
                                    <td></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>   
                                </tr>
                                <tr>
                                    <td scope="row">@lang('welcome.CompleteCoverPackage')</td>
                                    <td></td>          
                                    <td><i class="fas fa-times"></i></td>
                                    <td><i class="fas fa-check"></i></td> 
                                </tr>
                                <tr>
                                    <td scope="row">@lang('welcome.CollisionDamageWaiver')</td>
                                    <td></td>
                                    
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td> 
                                </tr>
                                <tr>
                                    <td scope="row">@lang('welcome.CollisionDamageWaiverNoExcess')</td>
                                    <td></td>
                                    
                                    <td><i class="fas fa-times"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <td scope="row">@lang('welcome.CollisionDamageWaiverNoExcess')</td>
                                    <td></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <td scope="row">@lang('Tax')</td>
                                    <td></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                
                                </tr>
                                <tr>
                                    <td scope="row">@lang('welcome.TheftWaiver')</td>
                                    <td></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <td scope="row">@lang('welcome.UnlimitedMileage')</td>
                                    <td></td>
                                    <td><i class="fas fa-check"></i></td>
                                    <td><i class="fas fa-check"></i></td>
                                </tr>
                                <tr>
                                    <td scope="row">@lang('welcome.YoungDriver')</td>
                                    <td></td>
                                    <td><i class="fas fa-times"></i></td>
                                    <td><i class="fas fa-times"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" 
                            style="width:100%;" data-dismiss="modal">@lang('welcome.ButtonClose')</button>
                    </div>
                </div><!-- modal-content -->
            </div> <!-- modal-dialog -->
        </div> <!-- end Modal -->
        <!-- Modal -->
        <div class="modal fade" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="cookieModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">@lang('welcome.cookiePolicy')</h2>                
                    </div>
                    <div class="modal-body">
                        <p>@lang('welcome.cookiePolicyText')</p>
                        <h4>@lang('welcome.howWeUseCookies')</h4>
                        <p>@lang('welcome.howWeUseCookiesTextOne')</p>
                        <p><@lang('welcome.howWeUseCookiesTextTwo')</p>
                        <p>@lang('welcome.howWeUseCookiesTextThree')</p>
                        <h4>@lang('welcome.cookiesThatWeUse')</h4>
                        <p>@lang('welcome.cookiesThatWeUseText')</p>
                        <h4>@lang('welcome.StrictlyNecessaryCookies')</h4>
                        <p>@lang('welcome.StrictlyNecessaryCookiesText')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="width:100%;" data-dismiss="modal">@lang('welcome.ButtonClose')</button>
                    </div>
                </div><!-- modal-content -->
            </div> <!-- modal-dialog -->
        </div> <!-- end Modal -->
        <header>
            @include('includes.nav')
        </header>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" >
                <div class="carousel-item" >
                 <img src="{{ url('/images/websiteMains/peugeot107.png') }}" class="d-block w-100" alt="Peugeot">  
                </div>
                <div class="carousel-item" >
                    <img src="{{ url('/images/websiteMains/opelCorsa.png') }}" class="d-block w-100" alt="Opel">
                </div>
                <div class="carousel-item active" >
                    <img src="{{ url('/images/websiteMains/fordFocus.png') }}" class="d-block w-100" alt="Ford">
                </div> 
            </div>
        </div> <!-- end Carrousel -->

        <div class="container">          
            <div class="row">
            <!-- @php $locale = session()->get('locale'); @endphp -->
                <div class="offset-md-1 col-md-10 offset-md-1 formulario">
                    <p style="font-size:0.6rem;margin-right:10px;" class="float-right">@lang('welcome.rentLimits')</p>
                    <h3>Get a Quote</h3>
                    <form method="get" action="{{ route('booking.index') }}" id="formulario">
                        @csrf
                        <div class="form-row form-group">                                                        
                            <div class="col-md-3 mb-3 col-sm-12">
                                <label>Age:</label>
                                <select class="form-control age @error('age') is-invalid @enderror" name="age" id="aboutUs" required>
                                    <option value="23" selected>+23</option>
                                    <option value="22">-23</option>   
                                </select>   
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                 
                            </div>                   
                            <div class="col-md-3 mb-3 col-sm-12">
                                <label for="pickUpDate">Pick up Date</label>
                                <input type="date" class="form-control @error('pickUpDate') is-invalid @enderror" id="pickUpDate" name="pickUpDate" min="<?php echo $date; ?>" value="<?php echo $date; ?>" required/><br/>       
                                @error('pickUpDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                            <div class="col-md-3 mb-3 col-sm-12">
                                <label for="dropOffDate">Drop off date.</label>
                                <input type="date" class="form-control @error('dropOffDate') is-invalid @enderror" id="dropOffDate" name="dropOffDate" min="<?php echo $dateAux; ?>" value="<?php echo $dateAux; ?>" required/><br/>
                                @error('dropOffDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                            <div class="col-md-3 mb-3 col-sm-12">
                                <label for="carros">Choose Car</label>  
                                <div class="input-group">
                                    <select id="carros" name="carros" class="form-control @error('carros') is-invalid @enderror">
                                        <option selected>All Cars</option>
                                        @isset($cars)
                                            @foreach($cars as $car)
                                            <option value="{{ $car->id }}">{{ $car->groupType }}{{' '}}{{ $car->marca }}</option>
                                            @endforeach
                                        @endisset
                                    </select>     
                                    @error('carros')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                        
                                </div>
                            </div>              
                        </div><!-- end form-row form-group --> 

                        <div class="form-row form-group" style="margin-top:-50px;">
                            <div class="offset-md-6 col-md-3 col-sm-12 mt-4"> 
                                <label for="AllInclusive">
                                All Inclusive <a data-toggle="modal" data-target="#exampleModal"> &#9432;</a>
                                </label>                            
                             </div>
                            <div class="col-md-3 col-sm-12">  
                                <label><br/></label>
                                <button type="submit" class="btn btn-primary" style="width:100%" id="submit">Search</button>
                            </div>     
                        </div><!-- end form-group -->

                    </form>
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div> <!-- end container formulario-->
        <!-- spinners code, a loading animation will appear until the request is closed -->
       @include('includes.spinner')
    <div>
    </div>
        <article>
            <div class="container about text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h2>@lang('welcome.aboutUs')</h2>
                        <hr style="background-color: grey;width:50px;height:0.8px;margin-left: auto;margin-right:auto;">
                        <h4 class="between">@lang('welcome.aboutSubTitle')</h4>
                        <blockquote>
                            <p class="top textBox"> 
                                @lang('welcome.aboutUsFirstText')
                            </p>
                            <p class="top textBox">
                                @lang('welcome.aboutUsSecondText')
                            </p>
                            <p class="top textBox">
                                @lang('welcome.aboutUsThirdText')
                            </p>
                        </blockquote>
                    </div> <!-- end col-md-12 -->
                <div> <!-- end row -->
            </div> <!-- end container -->
        </article>
        <div class="container">
            <div class="row top topper">
                <div class="col-md-4">
                    <legend>Low Cost </legend>
                    <img src="{{ url('/images/websiteMains/rent-a-car.jpeg') }}" 
                    class="img-thumbnail" alt="FiatPunto" loading="lazy">
                </div>
                <div class="col-md-4">
                    <legend>Algarve must seen</legend>
                    <img src="{{ url('/images/websiteMains/Algarve-benagil-cave.jpg') }}" 
                    class="img-thumbnail" alt="FiatPunto" loading="lazy">
                </div>
                <div class="col-md-4">
                    <legend>Ride with us</legend>
                    <img src="{{ url('/images/websiteMains/Algarve-Rent-a-Car.jpeg') }}" 
                    class="img-thumbnail" alt="FiatPunto" loading="lazy">
                </div>
            </div>
        </div>
        <p class="text-center h1 top topper">@lang('welcome.mostPopularCars')</p>
        <hr style="background-color: grey;width:100px;height:0.5px;margin-left: auto;margin-right:auto;">
        <div class="container-fluid backgroundImage">
        <!--<div class="container">-->
           <div class="row">  
           @isset($carros) 
                @foreach($carros as $carro) 
                    @if($loop->index < 3)
                        <div class="col-sm-12 col-md-6 col-lg-4 boxes mt-5 mb-5" style="max-width:450px;margin:0 auto;">
                            <div class="card border shadow-lg">
                                <img src="{{ Storage::url($carro->imagem) }}" class="card-img-top" alt="CarAvatar" loading="lazy">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $carro->groupType }}</h5>
                                    <p class="card-text text-center">{{ $carro->marca }}</p> 
                                    <p class="card-text text-center bg-primary border mr-5 ml-5" style="border-radius:3px;"><span class="text-white">@lang('welcome.from') € {{ $carro->epocaBaixa * 7 }} <small>@lang('welcome.week')</small></span></p>
                                    <div class="d-flex bd-highlight">
                                        <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-users iconsBox border" title="{{$carro->lugares}}xSeats"></i></div>
                                        <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase iconsBox border" title="{{$carro->bagagemGr}}xSuitcases"></i></div>
                                        <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase-rolling iconsBox2 border" title="{{$carro->bagagemPq}}xSmall Suitcases"></i></div>
                                        <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-gas-pump iconsBox border" title="{{$carro->combustivel}}"></i></div>
                                        <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-cogs iconsBox border" title="{{$carro->transmissao}}"></i></div>
                                        <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-snowflake iconsBox border" title="{{$carro->arCondicionado}}"></i></div>
                                    </div>
                                    
                                    <div class="d-flex flex-row bd-highlight">
                                        <div class="flex-fill bd-highlight text-center"><span style="padding:6px;width:100%;" class="legendasIcons2">x{{$carro->lugares}}</span></div>
                                        <div class="flex-fill bd-highlight text-center"><span style="padding:6px;width:100%;" class="legendasIcons2">x{{$carro->bagagemGr}}</span></div>
                                        <div class="flex-fill bd-highlight text-center"><span style="padding:6px;width:100%;" class="legendasIcons2">x{{$carro->bagagemPq}}</span></div>
                                        <div class="flex-fill bd-highlight text-center"><span style="padding-left:5px;width:100%;" class="legendasIcons2">{{$carro->combustivel}}</span></div>
                                        <div class="flex-fill bd-highlight text-center"><span style="padding-left:5px;width:100%;" class="legendasIcons2 text-center">{{$carro->transmissao}}</span></span></div>
                                        <div class="flex-fill bd-highlight text-center"><span style="padding-left:6px;padding-right:1px;" class="legendasIcons2">{{$carro->arCondicionado}}</span></div>
                                    </div>

                                    <div class="container mt-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="{{ route('booking-form.index') }}" method="get">
                                                    @csrf
                                                    <input type="submit" value="@lang('welcome.buttonBookNow') >" class="buttonFleet">
                                                    <input type="hidden" value="{{ $carro->id }}" name="carId">
                                                    <input type="hidden" value="ourFleet" name="bookingStore">
                                                </form>                                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    @endif              
                @endforeach 
            @endisset
                </div>
           <!--</div>-->
        </div>
        <div class="container">
            <div class="row top topper">
                <div class="col-md-12 pl-5 pr-5" style="margin-bottom: 100px;">
                    <h2 class="text-center">@lang('welcome.discoverTheAlgarve')</h2>
                    <blockquote>
                        <h5 class="text-center mt-4">@lang('welcome.discoverTheAlgarveSubTitle')</h5>
                        <p class="text-center mt-4">@lang('welcome.discoverTheAlgarveText')</p>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-5">
            <div class="row">         
                <div class="col-md-12 text-center text-white bookNowWelcome mb-5">    
                    <p class="mt-5 verticalAlign h1 mb-5 tamanhoFont">@lang('welcome.bookingForm')</p>
                    <a href="{{ url('booking-form') }}" class="text-white verticalAlign cor0 rounded p-2 ">@lang('welcome.buttonBookNow') ></a>           
                </div>           
            </div>
        </div>          
        @include('includes.footer')       
    </body>
</html>
