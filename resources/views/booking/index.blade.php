@extends('layouts.public') 
@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 100px;">
            @isset($carros)          
                @foreach($carros as $carro) 
                    <div class="col-sm-12 col-md-6 col-lg-4 boxes">
                    <div class="card border shadow-lg">
                        <img src="{{ Storage::url($carro->imagem) }}" class="card-img-top" alt="CarAvatar">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $carro->groupType }}</h5>
                            <p class="card-text text-center">{{ $carro->marca }}</p> 
                            <p class="card-text text-center bg-primary ml-5 mr-5" style="border-radius:3px;"><span class="text-white">From € {{ $carro->epocaBaixa * 7 }} <small>week</small></span></p>
                            <div class="d-flex bd-highlight">
                                <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-users iconsBox border" title="{{$carro->lugares}}xSeats"></i></div>
                                <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase iconsBox border" title="{{$carro->bagagemGr}}xSuitcases"></i></div>
                                <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase-rolling iconsBox2 border" title="{{$carro->bagagemPq}}xSmall Suitcases"></i></div>
                                <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-gas-pump iconsBox border" title="{{$carro->combustivel}}"></i></div>
                                <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-cogs iconsBox border" title="{{$carro->transmissao}}"></i></div>
                                <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-snowflake iconsBox border" title="{{$carro->arCondicionado}}"></i></div>
                            </div>     
                            <div class="d-flex flex-row bd-highlight">
                                <div class="p-1 flex-fill bd-highlight text-center"><span style="padding:6px;" class="legendasIcons2">x{{$carro->lugares}}</span></div>
                                <div class="p-1 flex-fill bd-highlight text-center"><span style="padding:6px;" class="legendasIcons2">x{{$carro->bagagemGr}}</span></div>
                                <div class="p-1 flex-fill bd-highlight text-center"><span style="padding:6px;" class="legendasIcons2">x{{$carro->bagagemPq}}</span></div>
                                <div class="p-1 flex-fill bd-highlight text-center"><span style="padding-left:6px;" class="legendasIcons2">{{$carro->combustivel}}</span></div>
                                <div class="p-1 flex-fill bd-highlight text-center"><span style="padding-left:8px;" class="legendasIcons2">{{$carro->transmissao}}</span></span></div>
                                <div class="p-1 flex-fill bd-highlight text-center"><span style="padding-left:6px;padding-right:1px;" class="legendasIcons2">{{$carro->arCondicionado}}</span></div>
                            </div>

                            <div class="d-flex bd-highlight">
                                <div class="flex-fill bd-highlight rateBox" style="height:100px;width:100%;background-color: #F5F5F5;">     
                                    <form method="get" action="{{ route('booking-form.index') }}" class="carForm">
                                    @csrf
                                        <p class="text-center legendasIcons">Basic Rate <a data-toggle="modal" data-target="#ModalBoxBasic"> &#9432;</a></p>
                                        <p class="text-center legendasIcons" style="margin-bottom:-0.1px;font-weight:bold;">Price €{{ ($epBaixa * $carro->epocaBaixa) + ($epMedia * $carro->epocaMedia) + ($epMediaAlta * $carro->epocaMediaAlta) + ($epAlta * $carro->epocaAlta) + ($pickUpPoint + $returnDropPoint) }}</p>
                                        <input type="submit" value="Book Now >" class="basicButton"/>
                                        <input type="hidden" value="{{$quote}}" name="quoteId">
                                        <input type="hidden" value="{{$carro->id}}" name="carId"> 
                                        <input type="hidden" value="{{ ($epBaixa * $carro->epocaBaixa) + ($epMedia * $carro->epocaMedia) + ($epMediaAlta * $carro->epocaMediaAlta) + ($epAlta * $carro->epocaAlta) + ($pickUpPoint + $returnDropPoint)}}" name="precoBasic">
                                        <input type="hidden" value="bookingBasic" name="bookingStore">
                                    </form> 
                                </div>
                                
                                <div class="flex-fill bd-highlight" style="height:100px;width:100%;background-color:#E0E0E0;">
                                    <form method="get" action="{{ route('booking-form.index') }}" class="carForm">
                                    @csrf
                                        <p class="text-center legendasIcons">All Inclusive <a data-toggle="modal" data-target="#ModalBoxAllInclusive"> &#9432;</a></p>
                                        <p class="text-center legendasIcons" style="margin-bottom:-0.1px;">Price €{{ (($epBaixa * $carro->seguro) + $epBaixa * $carro->epocaBaixa) + (($epMedia * $carro->seguro) + $epMedia * $carro->epocaMedia) + (($epMediaAlta * $carro->seguro) + $epMediaAlta * $carro->epocaMediaAlta) + (($epAlta * $carro->seguro) + $epAlta * $carro->epocaAlta) + ($pickUpPoint + $returnDropPoint)}}</p>
                                        <input type="submit" value="Book Now >" class="allIncButton" />
                                        <input type="hidden" value="{{$quote}}" name="quoteId">
                                        <input type="hidden" value="{{$carro->id}}" name="carId"> 
                                        <input type="hidden" value="{{ (($epBaixa * $carro->seguro) + $epBaixa * $carro->epocaBaixa) + (($epMedia * $carro->seguro) + $epMedia * $carro->epocaMedia) + (($epMediaAlta * $carro->seguro) + $epMediaAlta * $carro->epocaMediaAlta) + (($epAlta * $carro->seguro) + $epAlta * $carro->epocaAlta) + ($pickUpPoint + $returnDropPoint)}}" name="precoAllInc">
                                        <input type="hidden" value="bookingAllInc" name="bookingStore">
                                    </form>                           
                                </div>
                            </div> 
                         </div>
                    </div>
                </div>                 
                @endforeach    
            @endisset         
        </div>           
    </div>
@endsection