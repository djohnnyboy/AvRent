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

    <script src="https://js.stripe.com/v3/"></script>
        
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <script src="https://kit.fontawesome.com/c19b8db1d3.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/validation.js') }}" defer></script>
    <script src="{{ asset('js/dateValidation.js') }}" defer></script>
    <script src="{{ asset('js/spinner.js') }}" defer></script>
</head>
<body >
    <div id="app">
        <!-- Modal 01 -->
        <div class="modal fade" id="ModalBoxBasic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('bookingFormTermsConditionModals.termsConditions')</h5>                
                    </div>
                    <div class="modal-body m-1">
                        <h5>@lang('bookingFormTermsConditionModals.general')</h5>
                        <p>@lang('bookingFormTermsConditionModals.generalOne')</p>
                        <p>@lang('bookingFormTermsConditionModals.generalTwo')</p>
                        <p>@lang('bookingFormTermsConditionModals.generalThree')</p>
                        <p>@lang('bookingFormTermsConditionModals.generalFour')</p>
                        <p>@lang('bookingFormTermsConditionModals.generalFive')</p>
                        <p>@lang('bookingFormTermsConditionModals.generalSix')</p>
                        <h5>@lang('bookingFormTermsConditionModals.deposit')</h5>
                        <p>@lang('bookingFormTermsConditionModals.depositOne')</p>
                        <p>@lang('bookingFormTermsConditionModals.depositTwo')</p>
                        <h5>@lang('bookingFormTermsConditionModals.reservation')</h5>
                        <p>@lang('bookingFormTermsConditionModals.reservationOne')</p>
                        <p>@lang('bookingFormTermsConditionModals.reservationTwo')</p>
                        <p>@lang('bookingFormTermsConditionModals.reservationThree')</p>
                        <p>@lang('bookingFormTermsConditionModals.reservationFour')</p>
                        <p>@lang('bookingFormTermsConditionModals.reservationFive')</p>
                        <h5>@lang('bookingFormTermsConditionModals.priceInfo')</h5>
                        <p>@lang('bookingFormTermsConditionModals.priceInfoOne')</p>
                        <p>@lang('bookingFormTermsConditionModals.priceInfoTwo')</p>
                        <p>@lang('bookingFormTermsConditionModals.priceInfoThree')</p>
                        <p>@lang('bookingFormTermsConditionModals.priceInfoFour')</p>
                        <p>@lang('bookingFormTermsConditionModals.priceInfoFive')</p>
                        <p>@lang('bookingFormTermsConditionModals.priceInfoSix')</p>
                        <p>@lang('bookingFormTermsConditionModals.priceInfoSeven')</p>
                        <h5>@lang('bookingFormTermsConditionModals.insurance')</h5>
                        <p>@lang('bookingFormTermsConditionModals.insuranceOne')</p>
                        <p>@lang('bookingFormTermsConditionModals.insuranceTwo')</p>
                        <p>@lang('bookingFormTermsConditionModals.insuranceThree')</p>
                        <p>@lang('bookingFormTermsConditionModals.insuranceFour')</p>
                        <p>@lang('bookingFormTermsConditionModals.insuranceFive')</p>
                        <p>@lang('bookingFormTermsConditionModals.insuranceSix')</p>
                        <p>@lang('bookingFormTermsConditionModals.insuranceSeven')</p>
                        <p>@lang('bookingFormTermsConditionModals.insuranceEight')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">@lang('bookingFormTermsConditionModals.buttonClose')</button>
                    </div>
                </div><!-- modal-content -->
            </div> <!-- modal-dialog -->
        </div> <!-- end Modal -->
                <!-- Modal 02 -->
        <div class="modal fade" id="ModalBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('bookingFormTermsConditionModals.termsConditions')</h5>                
                    </div>
                    <div class="modal-body m-1">
                        <h5><b><h5>@lang('bookingFormTermsConditionModals.legalInfo')</h5></b></h5>
                        <p>@lang('bookingFormTermsConditionModals.legalInfoOne')</p>
                        <h5><b>@lang('bookingFormTermsConditionModals.dataProtection')</b></h5>
                        <p>@lang('bookingFormTermsConditionModals.dataProtectionOne')</p>
                        <p>@lang('bookingFormTermsConditionModals.dataProtectionTwo')</p>
                        <p>@lang('bookingFormTermsConditionModals.dataProtectionThree')</p>
                        <p>@lang('bookingFormTermsConditionModals.personalGrounds')</p>
                        <p>@lang('bookingFormTermsConditionModals.personalGroundsOne')</p>
                        <p>@lang('bookingFormTermsConditionModals.personalGroundsTwo')</p>
                        <p>@lang('bookingFormTermsConditionModals.personalGroundsThree')</p>
                        <p>@lang('bookingFormTermsConditionModals.personalGroundsFour')</p>
                        <p>@lang('bookingFormTermsConditionModals.personalGroundsFive')</p>
                        <p>@lang('bookingFormTermsConditionModals.personalGroundsSix')</p>
                        <h5><b>@lang('bookingFormTermsConditionModals.personalDataSafe')</b></h5>
                        <p>@lang('bookingFormTermsConditionModals.personalDataSafeOne')</p>
                        <h5><b>@lang('bookingFormTermsConditionModals.personalInfo')</b></h5>
                        <p>@lang('bookingFormTermsConditionModals.personalInfoOne')</p>
                        <h5><b>@lang('bookingFormTermsConditionModals.withDrawConsent')</b></h5>
                        <p>@lang('bookingFormTermsConditionModals.withDrawConsentOne')</p>      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">@lang('bookingFormTermsConditionModals.buttonClose')</button>
                    </div>
                </div><!-- modal-content -->
            </div> <!-- modal-dialog -->
        </div> <!-- end Modal -->
        <header>
            @include('includes.nav')
        </header>
        <section aria-label="breadcrumb" style="margin-top:120px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Booking Form</li>
            </ol>
        </section>
        
        <main class="py-4" >
            @yield('content')
        </main>

        @include('includes.footer')
    </div>
    
</body>
</html>
