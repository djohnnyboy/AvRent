<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" translate="no">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="car hire, cheap car hire, car rental,  rent a car, car rentals, hire car, cheap car rentals, cheap car rental, carrentals, rent car, car hire comparison, carrental, carhire, compare car hire, car rental comparison, rentalcars, rental cars, rent a car Algarve faro">
    <meta http-equiv="description" name="description" content="Faro Car Hire in Algarve, do need to hire a car at Faro Airport in Portugal. Ask a quote and get huge on-line discounts for Algarve car hire!">
    <meta name="copyright" content="AV Rent Car, Faro Airport Car Hire">
    <meta name="google" content="notranslate">
    <link rel="icon" href="{{ url('/images/websiteMains/icon.png') }}">


    <title>Av Rent a Car | Admin Panel</title>
  
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
    <!-- cdn charts.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <style>
    
        .footer {
            position: relative;
            margin-top: -150px; /* negative value of footer height */
            height: 350px;
            clear:both;
            padding-top:20px;
            background-color: #2f2929;
            color: white;
            text-align: center;
            margin-top: 300px;
        }   

        #mixedChart{
            width: 100%;
        } 
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ url('/') }}">Av Rent a Car </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto mt-1">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('home') }}">Admin Panel<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('carros') }}" class="text-white nav-link"> All Cars</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('carros/create') }}" class="text-white nav-link"> New Car</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('bookings') }}" class="text-white nav-link"> Bookings</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('messages') }}" class="text-white nav-link"> Messages</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('settings/1/edit') }}" class="text-white nav-link"> Settings</a>
                    </li>
                </ul>
                    <span class="navbar-text">
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-muted d-inline" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Admin {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-muted" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </span>
            </div>
        </nav>
           
        @include('partials.errors')
        @include('partials.success')
             
        <main class="py-4">
            @yield('content')
        </main>
        
        @include('includes.footerAdmin')
    </div>

    
</body>
</html>
