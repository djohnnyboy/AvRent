@extends('layouts.booking-form')
<script src="https://js.stripe.com/v3/"></script>
@section('content')
<div class="container" style="margin-top:20px;">
    <h1>@lang('bookingForm.bookingForm')</h1>
    <p>@lang('bookingForm.pleaseDetails')</p>
    <div class="row mb-5" style="margin-bottom: 150px;">      
        <div class="col-lg-7 col-md-7 border shadow-lg" style="padding-top:20px;padding-bottom:50px;">      
            <form method="post" action="{{ route('booking-form.store') }}" id="payment-form" style="padding:20px;" class="border">
                @csrf
                <div class="form-group">
                    <label for="name">@lang('bookingForm.fullName')</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" 
                        placeholder="Peter Smith" value="{{ old('name') }}" >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                 <div class="form-row">
                    <div class="col">
                        <label for="bookingName">@lang('bookingForm.email')</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" 
                            placeholder="petersmith@gmail.com" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col mt-2">
                        <label for="bookingName">@lang('bookingForm.phone')</label>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" 
                            placeholder="96854632" value="{{ old('phone') }}" required>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col">
                        <label for="dateOfBirth">@lang('bookingForm.dateBirth')</label>
                        <input type="date" class="form-control @error('dateOfBirth') is-invalid @enderror" name="dateOfBirth" 
                            id="dateOfBirth" value="{{ $birthDateIndex ?? ''}}" 
                            max="{{ $birthDateIndex }}" required>
                            @error('dateOfBirth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="col">
                        <label for="drivinglicence">@lang('bookingForm.drivingLicense')</label>
                        <input type="text" class="form-control @error('drivinglicence') is-invalid @enderror" 
                            name="drivinglicence" value="{{ old('drivinglicence') }}" required>
                            @error('drivinglicence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div> 
                <h3 class="top">@lang('bookingForm.reservationDetails')</h3>
                <div class="form-row">
                    <div class="col">
                        <label for="group">Group:</label>
                        <select id="carros" name="carros" class="form-control carros">
                            @isset($cars)                    
                                @foreach($cars as $car) 
                                    @isset($carId)                      
                                        @if($car->id == $carId)
                                            <option value="{{ $car->id }}" selected>{{ $car->groupType }}{{' '}}{{ $car->marca }}</option>
                                        @else
                                            <option value="{{ $car->id }}">{{ $car->groupType }}{{' '}}{{ $car->marca }}</option>
                                        @endif                                       
                                    @endisset                                     
                                @endforeach                                                          
                            @endisset
                        </select> 
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="col-lg-4 col-md-6">
                        <label for="pickUpPlace">@lang('bookingForm.pickUpPlace')</label>
                        <select id="pickUpPlace" name="pickUpPlace" class="form-control pickUpPlace @error('pickUpPlace') is-invalid @enderror" required>
                            @isset($pickUpPlace)
                                @if($pickUpPlace == 0)
                                    <option value="Armação de Pêra">Armação de Pêra € 0</option>
                                    <option value="Alvôr">Alvôr € 0</option>
                                    <option value="Portimão">Portimão € 0</option>
                                    <option value="Praia da Rocha">Praia da Rocha € 0</option>
                                    <option value="Praia do Carvoeiro">Praia do Carvoeiro € 0</option>
                                    <option value="Lagos">Lagos  € 20</option> 
                                    <option value="Aljezur">Aljezur  € 30</option> 
                                    <option value="Airport Faro">Airport Faro  € 0</option> 
                                    <option value="Monte Gordo">Monte Gordo € 20</option>
                                    <option value="Vila Nova de Cacela">Vila Nova de Cacela € 20</option>
                                    <option value="Vila Real de Santo Antonio">Vila Real de Santo Antonio € 20</option> 
                                @else
                                <option value="Armação de Pêra">Armação de Pêra € 0</option>
                                    <option value="Alvôr">Alvôr € 0</option>
                                    <option value="Portimão">Portimão € 0</option>
                                    <option value="Praia da Rocha">Praia da Rocha € 0</option>
                                    <option value="Praia do Carvoeiro">Praia do Carvoeiro € 0</option>
                                    <option value="Lagos">Lagos  € 20</option> 
                                    <option value="Aljezur">Aljezur  € 30</option> 
                                    <option value="Airport Faro">Airport Faro  € 0</option> 
                                    <option value="Monte Gordo">Monte Gordo € 20</option>
                                    <option value="Vila Nova de Cacela">Vila Nova de Cacela € 20</option>
                                    <option value="Vila Real de Santo Antonio">Vila Real de Santo Antonio € 20</option> 
                                @endif
                            @endisset
                        </select>
                        @error('pickUpPlace')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label for="pickUpDate">@lang('bookingForm.pickUpDate')</label>
                        <input type="date" class="form-control pickUpDate @error('pickUpDate') is-invalid @enderror" 
                            id="pickUpDate" name="pickUpDate" min="{{ $date }}" 
                            value="{{ $pickUpDate ?? $date}}" 
                            required/>  
                            @error('pickUpDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror               
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <label for="pickUpTime">@lang('bookingForm.pickUpTime')</label>
                        <input type="time" class="form-control pickUpTime @error('pickUpTime') is-invalid @enderror"  
                            name="pickUpTime" value="11:00" required/>   
                            @error('pickUpTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror             
                    </div>
                </div> 
                <div class="form-row">
                    <div class="col-lg-4 col-md-6">
                        <label for="dropOffPlace">@lang('bookingForm.dropOffPlace')</label>
                        <select id="dropOffPlace" name="dropOffPlace" class="form-control dropOffPlace @error('dropOffPlace') is-invalid @enderror" required>
                            @isset($dropOffPlace)
                                @if($dropOffPlace == 0)
                                    <option value="Armação de Pêra">Armação de Pêra € 0</option>
                                    <option value="Alvôr">Alvôr € 0</option>
                                    <option value="Portimão">Portimão € 0</option>
                                    <option value="Praia da Rocha">Praia da Rocha € 0</option>
                                    <option value="Praia do Carvoeiro">Praia do Carvoeiro € 0</option>
                                    <option value="Lagos">Lagos  € 20</option> 
                                    <option value="Aljezur">Aljezur  € 30</option> 
                                    <option value="Airport Faro">Airport Faro  € 0</option> 
                                    <option value="Monte Gordo">Monte Gordo € 20</option>
                                    <option value="Vila Nova de Cacela">Vila Nova de Cacela € 20</option>
                                    <option value="Vila Real de Santo Antonio">Vila Real de Santo Antonio € 20</option> 
                                @else
                                <option value="Armação de Pêra">Armação de Pêra € 0</option>
                                    <option value="Alvôr">Alvôr € 0</option>
                                    <option value="Portimão">Portimão € 0</option>
                                    <option value="Praia da Rocha">Praia da Rocha € 0</option>
                                    <option value="Praia do Carvoeiro">Praia do Carvoeiro € 0</option>
                                    <option value="Lagos">Lagos  € 20</option> 
                                    <option value="Aljezur">Aljezur  € 30</option> 
                                    <option value="Airport Faro">Airport Faro  € 0</option> 
                                    <option value="Monte Gordo">Monte Gordo € 20</option>
                                    <option value="Vila Nova de Cacela">Vila Nova de Cacela € 20</option>
                                    <option value="Vila Real de Santo Antonio">Vila Real de Santo Antonio € 20</option> 
                                @endif
                            @endisset             
                        </select>
                        @error('dropOffPlace')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <label for="dropOffDate">@lang('bookingForm.dropOffDate')</label>
                        <input type="date" class="form-control dropOffDate @error('dropOffDate') is-invalid @enderror"  id="dropOffDate" 
                            name="dropOffDate" min="{{ $dateAux }}" 
                            value="{{ $dropOffDate ?? $dateAux }}" required/>     
                            @error('dropOffDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror            
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <label for="dropOffTime">@lang('bookingForm.dropOffTime')</label>
                        <input type="time" class="form-control @error('dropOffTime') is-invalid @enderror" 
                            name="dropOffTime" value="11:00" required/>       
                            @error('dropOffTime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   
                    </div>
                </div>
                <h5 class="top">@lang('bookingForm.flightInfo')</h5>
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="flightNumber">@lang('bookingForm.flightNumber')</label>
                        <input class="form-control @error('flightNumber') is-invalid @enderror" type="text" id="flightNumber" 
                            name="flightNumber" value="{{ old('flightNumber') }}">      
                            @error('flightNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                       
                    </div>
                </div>
                <h3 class="top">@lang('bookingForm.extras')</h3>
                <div class="form-row">
                    <div class="offset-sm-1 col-sm-11">
                        @isset($checked)
                            @if($checked == "null")
                                <input class="form-check-input fullInsurance @error('fullInsurance') is-invalid @enderror" type="checkbox" 
                                    id="fullInsurance" name="fullInsurance">
                                    <label class="form-check-label color" for="fullInsurance">
                                    @lang('bookingForm.fullInsurance')
                                    </label>
                                    @error('fullInsurance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                    <span class="allInc float-right">No</span>
                            @else
                                <input class="form-check-input fullInsurance @error('fullInsurance') is-invalid @enderror" type="checkbox" 
                                        id="fullInsurance" name="fullInsurance" checked>
                                    <label class="form-check-label color" for="fullInsurance">
                                        @lang('bookingForm.fullInsurance')
                                    </label>
                                    @error('fullInsurance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                    <span class="allInc float-right">Yes</span>
                            @endif
                        @endisset
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="offset-sm-1 col-sm-11">
                        <input class="form-check-input spainInsurance @error('spainInsurance') is-invalid @enderror" type="checkbox" id="spainInsurance" 
                                name="spainInsurance" value="{{ $settings->spainInsurance  ?? ''}}">
                            <label class="form-check-label color" for="spainInsurance">
                            @lang('bookingForm.spainInsurance')
                            </label>
                            @error('spainInsurance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                            <span class="spainInc float-right">--</span>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="offset-sm-1 col-sm-11">
                        <input class="form-check-input gps @error('gps') is-invalid @enderror" type="checkbox" id="gps" 
                                name="gps" value="{{ $settings->gps  ?? ''}}">
                            <label class="form-check-label color" for="gps">
                                @lang('bookingForm.gps')
                            </label>
                            @error('gps')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                            <span class="gpsInc float-right">--</span>
                    </div>
                </div>
                <div class="form-row top">
                    <div class="offset-sm-1 col-sm-11">
                        <input class="form-check-input  numberBox @error('extraDriver') is-invalid @enderror" type="number" id="extraDriver" name="extraDriver" min="0" max="9">
                            <label class="form-check-label extrasSeats numberLegend" for="extraDriver">
                                @lang('bookingForm.extraDriver')
                            </label>
                            @error('extraDriver')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                            <span class="xDriver float-right">--</span>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="offset-sm-1 col-sm-11">
                        <input class="form-check-input babySeat numberBox @error('babySeat') is-invalid @enderror" type="number" name="babySeat" id="babySeat" min="-1" max="9">
                            <label class="form-check-label numberLegend" for="defaultCheck1">
                                @lang('bookingForm.todlerSeat')
                            </label>
                            @error('babySeat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                            <span class="todler float-right" id="todler">--</span>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="offset-sm-1 col-sm-11">
                        <input class="form-check-input infantSeat numberBox @error('infantSeat') is-invalid @enderror" type="number" name="infantSeat" id="infantSeat" min="0" max="9">  
                            <label class="form-check-label numberLegend" for="defaultCheck1">
                                @lang('bookingForm.infantSeat')
                            </label>
                            @error('infantSeat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                            <span class="infant float-right" id="infant">--</span>
                    </div>
                </div>
                <div class="form-row mt-2">
                    <div class="offset-sm-1 col-sm-11">
                        <input class="form-check-input boosterSeat numberBox  @error('boosterSeat') is-invalid @enderror" id="boosterSeat" type="number" 
                                    name="boosterSeat" min="0" max="9">
                            <label class="form-check-label numberLegend" for="defaultCheck1">
                                @lang('bookingForm.boosterSeat')
                            </label>
                            @error('boosterSeat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                            <span class="booster float-right" id="booster">--</span>
                    </div>
                </div> 
                <h5 class="top">@lang('bookingForm.comments')</h5>
                <div class="form-row mt-2">
                    <div class="col-md-12">
                        <textarea class="form-control @error('textArea') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5" 
                            name="textArea" value="{{ old('textArea') ?? '' }}"></textarea>
                            @error('textArea')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror     
                    </div>                   
                </div>
                <div class="form-row mt-2">
                    <div class="offset-sm-1 col-sm-11 top">   
                        <input class="form-check-input terms" type="checkbox" name="termsAndConditions" required>
                            <label class="form-check-label color" for="termsConditions">
                                @lang('bookingForm.termsConditionsOne') <a data-toggle="modal" 
                                            data-target="#ModalBoxBasic" style="color:#F68933;">@lang('bookingForm.termsConditionsTwo')</a> @lang('bookingForm.termsConditionsThree') <a 
                                                data-toggle="modal" data-target="#ModalBox" 
                                                style="color:#F68933;">@lang('bookingForm.termsConditionsFour')</a>
                            </label>               
                    </div>
                </div>
                
                @include('includes.spinner')

                <input type="hidden" name="bookingStore" value="booking-form" hidden>    
                <input type="hidden" class="hiddenPrice" name="hiddenPrice" id="hiddenPrice" value="0" hidden>  
                <input type="hidden" name="quoteId" value="{{ $quoteId ?? old('quoteId') ?? ''}}" hidden>
                <input type="submit" value="@lang('bookingForm.processBooking')" id="card-button" class="btn btn-primary mt-2" 
                          style="width:100%;" > 
        </div>   
        <div class="col-lg-5 col-md-5 boxes space" >             
            <div class="card border shadow-lg">
                <div class="image"></div>  
                <div class="card-body">
                    <h5 class="card-title groupType" ></h5>
                    <p class="card-text marca"></p>
                    <p class="card-text text-center bg-primary border shadow-lg" style="border-radius:3px;"><span class="text-white">From € <span class="perWeek"></span> <small>week</small></span></p>
                    <div class="d-flex bd-highlight icons"> </div>
                    <div class="d-flex flex-row bd-highlight">
                        <div class="p-1 flex-fill bd-highlight text-center"><span style="padding:6px;width:100%;" class="legendasIcons2 lugares"></span></div>
                        <div class="p-1 flex-fill bd-highlight text-center"><span style="padding-left:6px;width:100%;" class="legendasIcons2 bagagemGr"></div>
                        <div class="p-1 flex-fill bd-highlight text-center"><span style="padding-left:6px;width:100%;" class="legendasIcons2 bagagemPq"></div>
                        <div class="p-1 flex-fill bd-highlight text-center"><span style="padding-left:6px;width:100%;" class="legendasIcons2 combustivel"></div>
                        <div class="p-1 flex-fill bd-highlight text-center"><span style="padding-left:6px;width:100%;" class="legendasIcons2 text-center transmissao"></div>
                        <div class="p-1 flex-fill bd-highlight text-center"><span style="padding-left:6px;padding-right:1px;" class="legendasIcons2 arCondicionado"></div>
                    </div>
                </div>
            </div>        
        </div>     
    </div> 
</div> <!-- end container -->
<script> 
class BookingForm {

constructor(){
  
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),        
        }
    });
    $.ajax({
        url:"{{ route('ReservaController.fetch') }}",
        method:"POST",
        data:{
            carroIndex: $('.carros').val()       
            },
        dataType:'json',
        success:function(result){
            $('.image').append('<img src="'+result['imagem']+'" alt="car" class="card-img-top"/>');
            $('.groupType').html(result['groupType']); 
            $('.marca').html(result['marca']);
            $('.perWeek').html(result['epocaBaixa'] * 7);
            $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-users border" title="'+result['lugares']+'xSeats"></i></div>');
            $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase border" title="'+result['bagagemGr']+'xSuitcases"></i></div>'); 
            $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase-rolling border" title="'+result['bagagemPq']+'xSmall Suitcases"></i></div>');          
            $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-gas-pump border" title="'+result['combustivel']+'"></i></div>');
            $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-cogs border" title="'+result['transmissao']+'"></i></div>');
            $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-snowflake border" title="'+result['arCondicionado']+'"></i></div>');  

            $('.lugares').html('x'+result['lugares']);
            $('.bagagemGr').html('x'+result['bagagemGr']);
            $('.bagagemPq').html('x'+result['bagagemPq']);
            $('.combustivel').html(result['combustivel']);
            $('.transmissao').html(result['transmissao']);
            $('.arCondicionado').html(result['arCondicionado']);  
        }           
    })    
}

cars (){   
    $('.carros').change(function(){  
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url:"{{ route('ReservaController.fetch')}}",
         method:"POST",
         data:{carroIndex: $('.carros').val()},
         dataType:'json',
         success:function(result){
             $('.image').empty();
             $('.groupType').empty();
             $('.marca').empty();
             $('.perWeek').empty();
             $('.icons').empty();
             $('.lugares').empty();
             $('.bagagemGr').empty();
             $('.bagagemPq').empty();
             $('.combustivel').empty();
             $('.transmissao').empty();
             $('.arCondicionado').empty();
             $('.image').append('<img src="'+result['imagem']+'" alt="car" class="card-img-top"/>');  
             $('.groupType').html(result['groupType']); 
             $('.marca').html(result['marca']);
             $('.perWeek').html(result['epocaBaixa'] * 7);
             $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-users border" title="'+result['lugares']+'xSeats"></i></div>');
             $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase border" title="'+result['bagagemGr']+'xSuitcases"></i></div>'); 
             $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase-rolling border" title="'+result['bagagemPq']+'xSmall Suitcases"></i></div>');          
             $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-gas-pump border" title="'+result['combustivel']+'"></i></div>');
             $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-cogs border" title="'+result['transmissao']+'"></i></div>');
             $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-snowflake border" title="'+result['arCondicionado']+'"></i></div>');  
             $('.lugares').html('x'+result['lugares']);
             $('.bagagemGr').html('x'+result['bagagemGr']);
             $('.bagagemPq').html('x'+result['bagagemPq']);
             $('.combustivel').html(result['combustivel']);
             $('.transmissao').html(result['transmissao']);
             $('.arCondicionado').html(result['arCondicionado']); 
         }
     })
 });
}// end cars method

fullInsurance (){
    $('.fullInsurance').change(function(){  
       if ($('.fullInsurance').is(':checked')) {
            $('.allInc').empty();
            $('.allInc').html('Yes');
        } else {
            $('.allInc').empty();
            $('.allInc').html('No');
        }
    });
}

spainInsurance (){
    let that = this;
    this.spainInsurance ={{ $settings->spainInsurance }};
    $('.spainInsurance').change(function(){  
       if ($('.spainInsurance').is(':checked')) {
            $('.spainInc').empty();
            $('.spainInc').html(that.spainInsurance + '€');
        } else {
            $('.spainInc').empty();
            $('.spainInc').html('--');
        }
    });
}

gps (){
    let that = this;
    this.gps ={{ $settings->gps }};
    $('.gps').change(function(){  
       if ($('.gps').is(':checked')) {
            $('.gpsInc').empty();
            $('.gpsInc').html(that.gps + '€');
        } else {
            $('.gpsInc').empty();
            $('.gpsInc').html('--');
        }
    });
}

extraDriver (){
    let that = this;
    this.extraDriver ={{ $settings->extraDriver }};
    $('#extraDriver').change(function(){  
        $('.xDriver').empty();
        if ($('#extraDriver').val() == 1) {
            $('.xDriver').html('Free');
        }else if($('#extraDriver').val() > 1){
            $('.xDriver').html(that.extraDriver * parseInt($('#extraDriver').val() -1) + '€');
        }else{ 
            $('.xDriver').html('--');
        }
    });
}

todlerSeat (){
    let that = this;
    this.todlerSeat ={{ $settings->todlerSeat }};
    $('.babySeat').change(function(){  
        $('.todler').empty();
        $('.todler').html(that.todlerSeat * parseInt($('#babySeat').val()) + '€');
    });
}

infantSeat (){
    let that = this;
    this.infantSeat ={{ $settings->infantSeat }};
    $('.infantSeat').change(function(){  
        $('.infant').empty();
        $('.infant').html(that.todlerSeat * parseInt($('#infantSeat').val()) + '€');
    });
}

boosterSeat (){
    let that = this;
    this.boosterSeat ={{ $settings->boosterSeat }};
    $('#boosterSeat').change(function(){  
        $('.booster').empty();
        $('.booster').html(that.todlerSeat * parseInt($('#boosterSeat').val()) + '€');
    });
}

render (){
    this.cars();
    this.fullInsurance();
    this.spainInsurance();
    this.gps();
    this.extraDriver();
    this.todlerSeat();
    this.infantSeat();
    this.boosterSeat();
}
}

const init = new BookingForm;
init.render();

</script> 
<!-- 
<script>

class Season {

    constructor(){
        this.season = null;
        this.hiddenCheck = $('.hiddenChecked').val();
        this.hiddenCheckAux = 0;
        this.epocaBaixa = 'epocaBaixa';
        this.epocaMedia = 'epocaMedia';
        this.epocaAlta = 'epocaAlta';
        this.epocaMediaAlta = 'epocaMediaAlta';
    }

    getSeason (){
        this.pickUpDate = new Date($('.pickUpDate').val());
        this.dropOffDate = new Date($('.dropOffDate').val());
        this.day = this.pickUpDate.getDate();
        this.month = this.pickUpDate.getMonth()+1;

        if (this.month == 11 || this.month == 12 || (this.day >= 1 && this.month <= 3)) {
            this.season = 'epocaBaixa';
            return this.season;
        }
        if (this.month == 4 || this.month == 5 || (this.day <= 20 && this.month == 6) )  {
            this.season = 'epocaMedia';
            return this.season;
        }

        if ((this.month == 6 && this.day > 20) || this.month == 7 || this.month == 8) {
            this.season = 'epocaAlta';
            return this.season;
        }

        if (this.month == 9 || this.month == 10 ) {
            this.season = 'epocaMediaAlta';
            return this.season;
        }
    } 

    fullInsurance (){
        if (this.hiddenCheck == undefined) {
            return this.hiddenCheckAux;
        }else{
            return this.hiddenCheck;
        }
    } 

    subtractDates() {
        this.pickUpDate = new Date($('#pickUpDate').val());
        this.dropOffDate = new Date($('#dropOffDate').val());;
        return Math.ceil(Math.abs(this.dropOffDate - this.pickUpDate) / (1000 * 60 * 60 * 24));
    }

}

class BookingFormOnLoad extends Season {

    constructor(){
        super();
        let that = this;
        this.totalPrice = 0;
        this.payNowPrice = 0;
        this.payOnDelivery = 0;  
      
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),        
            }
        });
        $.ajax({
            url:"{{ route('ReservaController.fetch') }}",
            method:"POST",
            data:{
                carroIndex: $('.carros').val()       
                },
            dataType:'json',
            success:function(result){
                $('.image').append('<img src="'+result['imagem']+'" alt="car" class="card-img-top"/>');
                $('.groupType').html(result['groupType']); 
                $('.marca').html(result['marca']);
                $('.perWeek').html(result['epocaBaixa'] * 7);
                $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-users iconsBox border" title="'+result['lugares']+'xSeats"></i></div>');
                $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase iconsBox border" title="'+result['bagagemGr']+'xSuitcases"></i></div>'); 
                $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase-rolling iconsBox2 border" title="'+result['bagagemPq']+'xSmall Suitcases"></i></div>');          
                $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-gas-pump iconsBox border" title="'+result['combustivel']+'"></i></div>');
                $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-cogs iconsBox border" title="'+result['transmissao']+'"></i></div>');
                $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-snowflake iconsBox border" title="'+result['arCondicionado']+'"></i></div>');  

                $('.lugares').html('x'+result['lugares']);
                $('.bagagemGr').html('x'+result['bagagemGr']);
                $('.bagagemPq').html('x'+result['bagagemPq']);
                $('.combustivel').html(result['combustivel']);
                $('.transmissao').html(result['transmissao']);
                $('.arCondicionado').html(result['arCondicionado']);  

                $('.epocaBaixa').val(result['epocaBaixa']); 
                $('.epocaMedia').val(result['epocaMedia']); 
                $('.epocaAlta').val(result['epocaAlta']); 
                $('.epocaMediaAlta').val(result['epocaMediaAlta']); 
                $('.seguro').val(result['seguro']); 

                if (that.getSeason() == that.epocaBaixa) {
                    that.totalPrice = Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) + result['epocaBaixa']));
                }

                if (that.getSeason() == that.epocaMedia) {
                    that.totalPrice = Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) + result['epocaMedia']));
                }

                if (that.getSeason() == that.epocaAlta) {
                    that.totalPrice = Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) +result['epocaAlta']));
                }

                if (that.getSeason() == that.epocaMediaAlta) {
                    that.totalPrice = Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) + result['epocaMediaAlta']));
                }
                $('.preco').html(that.totalPrice);
            }           
        })    
    }
}

const init = new BookingFormOnLoad;

class BookingFormOnChange extends Season {
    constructor (){
        super()
        this.top = this;
        this.price = null;
        
    } // end of constructor

    cars (){
        let that = this.top;
        this.totalPrice = 0;
        this.payNowPrice = 0;
        this.payOnDelivery = 0; 
        this.pickUpPlace = null; 
      
        $('.carros').change(function(){  
        that.pickUpPlace = that.findPricePlace($('#pickUpPlace').val());
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         $.ajax({
             url:"{{ route('ReservaController.fetch')}}",
             method:"POST",
             data:{carroIndex: $('.carros').val()},
             dataType:'json',
             success:function(result){
                 $('.image').empty();
                 $('.groupType').empty();
                 $('.marca').empty();
                 $('.perWeek').empty();
                 $('.icons').empty();
                 $('.lugares').empty();
                 $('.bagagemGr').empty();
                 $('.bagagemPq').empty();
                 $('.combustivel').empty();
                 $('.transmissao').empty();
                 $('.arCondicionado').empty();
                 
                 $('.epocaBaixa').empty();
                 $('.epocaMedia').empty();
                 $('.epocaAlta').empty();
                 $('.epocaMediaAlta').empty();
                 $('.seguro').empty();
                 $('.preco').empty();

                 $('.image').append('<img src="'+result['imagem']+'" alt="car" class="card-img-top"/>');  
                 $('.groupType').html(result['groupType']); 
                 $('.marca').html(result['marca']);
                 $('.perWeek').html(result['epocaBaixa'] * 7);
                 $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-users iconsBox border" title="'+result['lugares']+'xSeats"></i></div>');
                 $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase iconsBox border" title="'+result['bagagemGr']+'xSuitcases"></i></div>'); 
                 $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase-rolling iconsBox2 border" title="'+result['bagagemPq']+'xSmall Suitcases"></i></div>');          
                 $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-gas-pump iconsBox border" title="'+result['combustivel']+'"></i></div>');
                 $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-cogs iconsBox border" title="'+result['transmissao']+'"></i></div>');
                 $('.icons').append('<div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-snowflake iconsBox border" title="'+result['arCondicionado']+'"></i></div>');  

                 $('.lugares').html('x'+result['lugares']);
                 $('.bagagemGr').html('x'+result['bagagemGr']);
                 $('.bagagemPq').html('x'+result['bagagemPq']);
                 $('.combustivel').html(result['combustivel']);
                 $('.transmissao').html(result['transmissao']);
                 $('.arCondicionado').html(result['arCondicionado']); 

                 $('.epocaBaixa').val(result['epocaBaixa']); 
                 $('.epocaMedia').val(result['epocaMedia']); 
                 $('.epocaAlta').val(result['epocaAlta']); 
                 $('.epocaMediaAlta').val(result['epocaMediaAlta']); 
                 $('.seguro').val(result['seguro']); 

                 if (that.getSeason() == that.epocaBaixa) {
                    that.totalPrice = that.pickUpPlace + Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) + result['epocaBaixa']));
                 }

                 if (that.getSeason() == that.epocaMedia) {
                    that.totalPrice =  Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) + result['epocaMedia']));
                 }

                 if (that.getSeason() == that.epocaAlta) {
                    that.totalPrice = Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) +result['epocaAlta']));
                 }

                 if (that.getSeason() == that.epocaMediaAlta) {
                    that.totalPrice = Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) + result['epocaMediaAlta']));
                 }
                 $('.preco').html(that.totalPrice);
             }
         })
         // reset form values 
         $('#extraDriver').val(0);
         $('#babySeat').val(0);
         $('#infantSeat').val(0);
         $('#boosterSeat').val(0);
         $('#fullInsurance').prop('checked',false);
         $('#spainInsurance').prop('checked',false);
         $('#gps').prop('checked',false);
         $('.extraDriver').val(0);
         $('.xDriver').html('--');
         $('.babySeat').val(0);
         $('.todler').html('--');
         $('.infantSeat').val(0);
         $('.infant').html('--');
         $('.boosterSeat').val(0);
         $('.booster').html('--');

     });
    }// end cars method

    

    getPickUpPlace (){
        let that = this.top; 
        this.pickUpList = [];  
        this.pickUpList.unshift(0);
        this.aux = null;
        $('#pickUpPlace').change(function(){ 
            that.price = parseInt($('#preco').html());
            that.current = that.findPricePlace($('#pickUpPlace').val());
            that.pickUpList.push(that.current);
            that.aux = that.pickUpList[that.pickUpList.length - 2]; 
            that.clearPrice();
            that.price += that.current - that.aux;
            $('#preco').html(that.price);
        }); 
    }

    getDropOffPlace (){
        let that = this.top; 
        this.pickUpListTwo = [];  
        this.pickUpListTwo.unshift(0);
        this.aux = null;
        $('#dropOffPlace').change(function(){ 
            that.price = parseInt($('#preco').html());
            that.current = that.findPricePlace($('#dropOffPlace').val());
            that.pickUpListTwo.push(that.current);
            that.aux = that.pickUpListTwo[that.pickUpListTwo.length - 2]; 
            that.clearPrice();
            that.price += that.current - that.aux;
            $('#preco').html(that.price);
        }); 
    }

    clearPrice(){
        $('#preco').empty();   
    }
    
    findPricePlace (value){
        switch (value) {
            case 'Armação de Pêra':
                return 0;
                break;
            case 'Alvôr':
                return 0;
                break;
            case 'Portimão':
                return 0;
                break;
            case 'Praia da Rocha':
                return 0;
                break;
            case 'Praia do Carvoeiro':
                return 0;
                break;
            case 'Lagos':
                return 20;
                break;
            case 'Aljezur':
                return 30;
                break;
            case 'Airport Faro':
                return 20;
                break;
            case 'Monte Gordo':
                return 20;
                break;
            case 'Vila Nova de Cacela':
                return 20;
                break;
            case 'Vila Real de Santo Antonio':
                return 20;
                break;
            default:
                break;
        }
    }

    getPickUpDate(){

        let that = this.top;
        this.pickUpDate = $('#pickUpDate').val();
        this.dropOffDate = $('#dropOffDate').val();

        $('#pickUpDate').change(function(){ 
            if (that.getSeason() == that.epocaBaixa) {
            that.totalPrice = that.pickUpPlace + Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) + $('.epocaBaixa').val()));
            }

            if (that.getSeason() == that.epocaMedia) {
            that.totalPrice =  Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) + $('.epocaMedia').val()));
            }

            if (that.getSeason() == that.epocaAlta) {
            that.totalPrice = Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) + $('.epocaMedia').val()));
            }

            if (that.getSeason() == that.epocaMediaAlta) {
            that.totalPrice = Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) +$('.epocaMediaAlta').val()));
            }
            $('.preco').html(that.totalPrice);
        });
    }

    getDropOffDate(){

        let that = this.top;
        this.pickUpDate = $('#pickUpDate').val();
        this.dropOffDate = $('#dropOffDate').val();

        $('#dropOffDate').change(function(){ 
            if (that.getSeason() == that.epocaBaixa) {
                that.totalPrice = that.pickUpPlace + Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) + $('.epocaBaixa').val()));
                }

                if (that.getSeason() == that.epocaMedia) {
                that.totalPrice =  Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) + $('.epocaMedia').val()));
                }

                if (that.getSeason() == that.epocaAlta) {
                that.totalPrice = Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) + $('.epocaMedia').val()));
                }

                if (that.getSeason() == that.epocaMediaAlta) {
                that.totalPrice = Math.ceil(that.subtractDates() * (parseInt(that.fullInsurance()) +$('.epocaMediaAlta').val()));
                }
                $('.preco').html(that.totalPrice);
        });
    }

    getInsurancePrice (){

        let that = this.top;

        $('#fullInsurance').change(function(){  
            if ($('#fullInsurance').is(':checked')) {
                that.price = parseInt($('#preco').html());
                that.clearPrice();
                $('.allInc').empty();          
                that.tax = that.subtractDates() * $('.seguro').val();
                $('.allInc').html(that.tax + ' €');
                that.price += that.subtractDates() * $('.seguro').val();
                $('#preco').html(that.price);
            } else{
                that.price = parseInt($('#preco').html());
                that.price -= that.subtractDates() * $('.seguro').val();
                that.clearPrice();
                $('#preco').html(that.price);
                $('.allInc').empty();
                $('.allInc').html('--');
            } 
        });
    } 

    getSpainInsurance (){

        let that = this.top;

        $('#spainInsurance').change(function(){  
            if ($('#spainInsurance').is(':checked')) {
                that.price = parseInt($('#preco').html());
                that.clearPrice();
                $('.spainInc').empty();          
                that.tax = that.subtractDates() * $('.spainInsurance').val();
                $('.spainInc').html(that.tax + ' €');
                that.price += that.subtractDates() * $('.spainInsurance').val();
                $('#preco').html(that.price);
            }else{
                that.price -= that.subtractDates() * $('.spainInsurance').val();
                that.clearPrice();
                $('#preco').html(that.price);
                $('.spainInc').empty();
                $('.spainInc').html('--');
            }
        });
    }


    getGps (){

        let that = this.top;

        $('#gps').change(function(){  
            if ($('#gps').is(':checked')) {
                that.price = parseInt($('#preco').html());
                that.clearPrice();
                $('.gpsInc').empty();  
                $('.gpsInc').html($('.gps').val() + ' €');        
                that.price += parseInt($('.gps').val());
                
                $('#preco').html(that.price);
            }else{
                that.price -= $('.gps').val();
                that.clearPrice();
                $('#preco').html(that.price);
                $('.gpsInc').empty();
                $('.gps').html('--');
            }
        });
    }

    getExtraDriver (){

        let that = this.top;
        this.extraDriver = {{ $settings->extraDriver  ?? '' }};
        this.priceList = [];
        this.extraDriverList = [];

        $('#extraDriver').change(function(){  
            that.priceList.push(parseInt($('#preco').html())) ;
            if ($('#extraDriver').val() == 1) {
                $('.xDriver').empty();
                $('.xDriver').html('Free');
                that.clearPrice();
                $('#preco').html(that.priceList[0]);
            }else if($('#extraDriver').val() > 1){
                that.extraDriverList.push(parseInt($('#extraDriver').val()) * that.extraDriver);    
                that.price = that.priceList[0] + (that.extraDriver * parseInt($('#extraDriver').val()) - that.extraDriver);
                $('.xDriver').empty();
                $('.xDriver').html(that.extraDriver * parseInt($('#extraDriver').val()) - that.extraDriver + ' €');
                that.clearPrice();
                that.price = that.priceList[0] + (that.extraDriver * parseInt($('#extraDriver').val()) ) - that.extraDriver;
                $('#preco').html(that.price);
            }
        });
    }

    getTodlerSeat (){
        let that = this.top;
        this.todlerSeat = {{ $settings->todlerSeat  ?? ''}};
        this.priceList = [];
        this.todlerSeatList = [];
        this.sum= null;
        $('#babySeat').change(function(){  
            that.priceList.push(parseInt($('#preco').html())) ;
            if($('#babySeat').val() > -1){
                that.todlerSeatList.push(parseInt($('#babySeat').val()) * that.todlerSeat);    
                that.price = that.priceList[0] + that.todlerSeatList[that.todlerSeatList.length - 1];
                $('#todler').empty();
                $('#todler').html(that.todlerSeat * parseInt($('#babySeat').val()) + ' €');
                that.clearPrice();
                that.price = that.priceList[0] + (that.todlerSeat * parseInt($('#babySeat').val()) );
                $('#preco').html(that.price);
            }
        });
    }

    getInfantSeat (){
        let that = this.top;
        this.infantSeat = {{ $settings->infantSeat  ?? ''}};
        this.priceList = [];
        this.infantSeatList = [];
        $('#infantSeat').change(function(){  
            that.priceList.push(parseInt($('#preco').html())) ;
            if($('#babySeat').val() > -1){
                that.infantSeatList.push(parseInt($('#infantSeat').val()) * that.todlerSeat);    
                that.price = that.priceList[0] + that.infantSeatList[that.infantSeatList.length - 1];
                $('#infant').empty();
                $('#infant').html(that.infantSeat * parseInt($('#infantSeat').val()) + ' €');
                that.clearPrice();
                that.price = that.priceList[0] + (that.todlerSeat * parseInt($('#infantSeat').val()) );
                $('#preco').html(that.price);
            }
        });
    }


    getBoosterSeat (){
        let that = this.top;
        this.boosterSeat = {{ $settings->boosterSeat  ?? ''}};
        this.priceList = [];
        this.boosterSeatList = [];
        $('#boosterSeat').change(function(){  
            that.priceList.push(parseInt($('#preco').html())) ;
            if($('#boosterSeat').val() > -1){
                that.boosterSeatList.push(parseInt($('#boosterSeat').val()) * that.boosterSeat);    
                that.price = that.priceList[0] + that.boosterSeatList[that.boosterSeatList.length - 1];
                $('#booster').empty();
                $('#booster').html(that.boosterSeat * parseInt($('#boosterSeat').val()) + ' €');
                that.clearPrice();
                that.price = that.priceList[0] + (that.boosterSeat * parseInt($('#boosterSeat').val()) );
                $('#preco').html(that.price);
            }
        });
    }
  

    render (){
        this.cars();
        this.getPickUpPlace();
        this.getDropOffPlace();
        this.getPickUpDate();
        this.getDropOffDate();
        this.getInsurancePrice();
        this.getSpainInsurance();
        this.getGps();
        this.getExtraDriver();
        this.getTodlerSeat();
        this.getInfantSeat();
        this.getBoosterSeat();
    }
}

const ini = new BookingFormOnChange;
ini.render();
</script>  -->
@endsection