@extends('layouts.fleet') 
@section('content')
    <section aria-label="breadcrumb" style="margin-top:95px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('ourFleet.ourFleet')</li>
        </ol>
    </section>
    <div class="container">
    <h1 class="text-center">@lang('ourFleet.ourFleet')</h1>
    <hr style="background-color: grey;width:50px;height:0.5px;margin-left: auto;margin-right:auto;">
        <div class="row" style="margin-bottom: 150px;">
            @isset($cars)          
                @foreach($cars as $carro) 
                <div class="col-sm-12 col-md-6 col-lg-4 boxes top">
                    <div class="card border shadow-lg">
                        <img src="{{ Storage::url($carro->imagem) }}" class="card-img-top" alt="CarAvatar">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $carro->groupType }}</h5>
                            <p class="card-text text-center">{{ $carro->marca }}</p> 
                            <p class="card-text text-center bg-primary border mr-5 ml-5"><span class="text-white">@lang('ourFleet.from') € {{ $carro->epocaBaixa * 7 }} <small>@lang('ourFleet.week')</small></span></p>
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
                                            <input type="submit" value="@lang('ourFleet.bookNow') >" class="buttonFleet">
                                            <input type="hidden" value="{{ $carro->id }}" name="carId">
                                            <input type="hidden" value="ourFleet" name="bookingStore">
                                        </form>                                       
                                    </div>
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