@extends('layouts.admin')
@section('content')
<div class="container">
<h1 class="text-center mt-5">Av rent a car - Fleet </h1>
<hr style="background-color: grey;width:120px;height:2px;margin-left: auto;margin-right:auto;">
    <div class="row">
        @isset($carro)          
            @foreach($carro as $car) 
            <div class="col-sm-12 col-md-6 col-lg-4 boxes top mt-3">
                <div class="card border shadow-lg">
                    <img src="{{ Storage::url($car->imagem) }}" class="card-img-top" alt="CarAvatar">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $car->groupType }}</h5>
                        <p class="card-text text-center">{{ $car->marca }}</p> 
                        <p class="card-text text-center bg-primary ml-5 mr-5" style="border-radius:3px;"><span class="text-white">From € {{ $car->epocaBaixa * 7 }} <small>week</small></span></p>
                        <div class="d-flex bd-highlight">
                            <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-users iconsBox border" title="{{$car->lugares}}xSeats"></i></div>
                            <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase iconsBox border" title="{{$car->bagagemGr}}xSuitcases"></i></div>
                            <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-suitcase-rolling iconsBox2 border" title="{{$car->bagagemPq}}xSmall Suitcases"></i></div>
                            <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-gas-pump iconsBox border" title="{{$car->combustivel}}"></i></div>
                            <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-cogs iconsBox border" title="{{$car->transmissao}}"></i></div>
                            <div class="p-1 flex-fill bd-highlight text-center"><i class="fas fa-snowflake iconsBox border" title="{{$car->arCondicionado}}"></i></div>
                        </div>
                        
                        <div class="d-flex flex-row bd-highlight">
                            <div class="flex-fill bd-highlight text-center"><span style="padding:6px;width:100%;" class="legendasIcons2">x{{$car->lugares}}</span></div>
                            <div class="flex-fill bd-highlight text-center"><span style="padding:6px;width:100%;" class="legendasIcons2">x{{$car->bagagemGr}}</span></div>
                            <div class="flex-fill bd-highlight text-center"><span style="padding:6px;width:100%;" class="legendasIcons2">x{{$car->bagagemPq}}</span></div>
                            <div class="flex-fill bd-highlight text-center"><span style="padding-left:5px;width:100%;" class="legendasIcons2">{{$car->combustivel}}</span></div>
                            <div class="flex-fill bd-highlight text-center"><span style="padding-left:5px;width:100%;" class="legendasIcons2 text-center">{{$car->transmissao}}</span></span></div>
                            <div class="flex-fill bd-highlight text-center"><span style="padding-left:6px;padding-right:1px;" class="legendasIcons2">{{$car->arCondicionado}}</span></div>
                        </div>

                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="d-inline float-left leftButton">
                                        <a href="/carros/{{ $car->id }}/edit" class="btn-danger rounded p-2">Editar carro</a>   
                                    </div>
                                    <div class="d-inline float-right rightButton">
                                        <a href="/carros/{{ $car->id }}" class="btn-primary rounded p-2">Show carro</a>   
                                    </div>                                 
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