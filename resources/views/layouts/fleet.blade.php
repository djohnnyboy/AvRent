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

    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{ url('/images/websiteMains/icon.png') }}">

    <!-- Scripts -->
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
    <script src="{{ asset('js/spinner.js') }}" defer></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <header>
            @include('includes.nav')
        </header>
        
        <main class="py-4">
            @yield('content')
        </main>
        @include('includes.footer')
    </div>
</body>
</html>
