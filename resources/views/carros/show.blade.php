@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        @isset($carro)
            <div class="col-sm-12 col-md-6 col-lg-5 boxes mt-3 ml-1">
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
                            <div class="flex-fill bd-highlight text-center"><span style="padding:6px;width:100%;" class="legendasIcons2">x{{$carro->lugares}}</span></div>
                            <div class="flex-fill bd-highlight text-center"><span style="padding:6px;width:100%;" class="legendasIcons2">x{{$carro->bagagemGr}}</span></div>
                            <div class="flex-fill bd-highlight text-center"><span style="padding:6px;width:100%;" class="legendasIcons2">x{{$carro->bagagemPq}}</span></div>
                            <div class="flex-fill bd-highlight text-center"><span style="padding-left:5px;width:100%;" class="legendasIcons2">{{$carro->combustivel}}</span></div>
                            <div class="flex-fill bd-highlight text-center"><span style="padding-left:5px;width:100%;" class="legendasIcons2 text-center">{{$carro->transmissao}}</span></span></div>
                            <div class="flex-fill bd-highlight text-center"><span style="padding-left:6px;padding-right:1px;" class="legendasIcons2">{{$carro->arCondicionado}}</span></div>
                        </div>

                        <div class="container-fluid mt-2">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 text-center mt-3">
                                    <div class="d-sm-inline-flex float-left leftButton">
                                        <a href="/carros/{{ $carro->id }}/edit" class="btn btn-primary p-2 rounded">Editar Carro</a>   
                                    </div>   
                                    <div class="d-sm-inline-flex float-right rightButton">
                                        <a href="#" class="btn btn-danger p-2 rounded" onclick="
                                        let result = confirm('Are you sure you wanna delete the car?');
                                        if(result){
                                            event.preventDefault();
                                            document.getElementById('delete-form').submit();
                                        }
                                        ">
                                            Delete Carro
                                        </a>
                                        <form id="delete-form" action="{{route('carros.destroy',[$carro->id])}}" method="post" style="display: none">
                                            <input type="hidden" name="_method" value="delete" />
                                            @csrf
                                        </form>
                                    </div>                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5 boxes mt-3 ml-1">
                <table class="table invoiceBox border shadow-lg">
                    <div>
                        <canvas id="myChartPrice" width="400" height="200"></canvas>
                        <script type="text/javascript">
                        var priceMes = new Array(<?php echo implode(',', $priceMes ); ?>);
                        var ctx = document.getElementById('myChartPrice').getContext('2d');
                        var myChartPrice = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun','Jul','Ago','Set','Out','Nov','Dez'],
                                datasets: [{
                                    label: 'Faturacao p/ mes',
                                    data: priceMes,						
                                    backgroundColor: [
                                        'rgba(0,93,130,1)',
                                        'rgba(246,137,51,1)',
                                        'rgba(0,93,130,1)',
                                        'rgba(246,137,51,1)',
                                        'rgba(0,93,130,1)',
                                        'rgba(246,137,51,1)',
                                        'rgba(0,93,130,1)',
                                        'rgba(246,137,51,1)',
                                        'rgba(0,93,130,1)',
                                        'rgba(246,137,51,1)',
                                        'rgba(0,93,130,1)',
                                        'rgba(246,137,51,1)',
                                    ],					
                                    borderColor: [
                                        'rgba(246,137,51,1)',
                                        'rgba(0,93,130,1)',
                                        'rgba(246,137,51,1)',
                                        'rgba(0,93,130,1)',
                                        'rgba(246,137,51,1)',
                                        'rgba(0,93,130,1)',
                                        'rgba(246,137,51,1)',
                                        'rgba(0,93,130,1)',
                                        'rgba(246,137,51,1)',
                                        'rgba(0,93,130,1)',
                                        'rgba(246,137,51,1)',
                                        'rgba(0,93,130,1)',
                                    ],
                                    borderWidth: 1.5,
                                    hoverBackgroundColor: 'rgba(0,93,130,1)',
                                    hoverBorderColor: 'rgba(246,137,51,1)',
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                },
                                responsive: true,
					            maintainAspectRatio: false,
                            }
                        });
                        </script>
                    </div>
                    <thead>
                        <tr>
                            <th scope="col" class="bg-dark text-white mb-1">Car Info</th>        
                            <th colspan="3" class="bg-dark">
                                <form class="form-inline float-right mt-1" action="" method="{{ url()->current() }}">
                                    @csrf
                                    <input class="form-control" type="search" placeholder="Season ex. 2022" aria-label="Search" style="width:50%;" name="ano">
                                    <button class="btn btn-outline-success ml-1" type="submit">Search</button>
                                </form>
                            </th>
                
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Epoca Baixa:</th>
                            <td></td>
                            <td >€ {{ $carro->epocaBaixa ?? ''}}</td>
                            <td>p/ dia</td>
                        </tr>
                        <tr>
                            <th scope="row">Epoca Media:</th>
                            <td></td>
                            <td>€ {{ $carro->epocaMedia ?? ''}}</td>
                            <td>p/ dia</td>
                        </tr>
                        <tr>
                            <th scope="row">Epoca Alta:</th>
                            <td></td>
                            <td>€ {{ $carro->epocaAlta ?? ''}}</td>
                            <td>p/ dia</td>
                        </tr>
                        <tr>
                            <th scope="row">Epoca Media Alta:</th>
                            <td></td>
                            <td>€ {{ $carro->epocaMediaAlta ?? ''}}</td>
                            <td>p/ dia</td>
                        </tr>
                        <tr>
                            <th scope="row">Seguro contra todos:</th>
                            <td></td>
                            <td>€ {{ $carro->seguro ?? ''}}</td>
                            <td>p/ dia</td>
                        </tr>
                    </tbody> 
                </table>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 border shadow-lg mt-3 ml-4" style="position: relative; height:100vh; width:100vw;max-width:1000px;max-height:300px;">
                        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                        <canvas id="mixedChart"  height="300"></canvas>
                        <script type="text/javascript">
                            var quotes = new Array(<?php echo implode(',', $quotesMes ); ?>);
                            var reservas = new Array(<?php echo implode(',', $reservasMes ); ?>);
                            var ctx = document.getElementById('mixedChart').getContext('2d');
                            var mixedChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                datasets: [{
                                    label: 'Quotes',
                                    data: quotes,/*
                                    backgroundColor: [
                                        'rgba(246,137,51,1)',
                                    ],*/
                                    borderColor: [
                                        'rgba(246,137,51,1)',
                                    ],
                                    borderWidth: 1.5,
                                    type: 'line',
                                }, {
                                    label: 'Reservas',
                                    data: reservas,/*
                                    backgroundColor: [
                                        'rgba(0,93,130,1)',
                                    ],*/
                                    borderColor: [
                                        'rgba(0,93,130,1)',
                                    ],
                                    borderWidth: 1.5,
                                    // Changes this dataset to become a line
                                    type: 'line'
                                }],
                                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun','Jul','Ago','Set','Out','Nov','Dez']
                            },
                            
                            options: {
                                responsive:true,
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                },
                                responsive: true,
					            maintainAspectRatio: false,
                            }
                        });
                        </script>
                </div>
            </div>
        @endisset  
    </div>
</div>
@endsection