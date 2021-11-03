@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card border shadow-lg">
                <div class="form-group row">
                    <div class="col-md-4">
                        <h1 class="mt-5 text-center">Editar Carro</h1>
                        <h5 class="text-center m-5">Cuidado !!!</br> Isto vai editar o carro.</h5>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ Storage::url($carro->imagem) }}" class="card-img-top" alt="CarAvatar">
                    </div>
                    <div class="col-md-4">
                        <div class="mt-4 text-center">
                            <i class="fas fa-5x fa-plus text-center d-inline"></i>
                            <i class="fas fa-edit fa-10x text-center d-inline"></i>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-danger">
                <form method="post" action="{{ route('carros.update', [$carro->id]) }}" enctype="multipart/form-data">            
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="grupo" class="text-white">Insere Grupo</label>
                        <input type="text" class="form-control" name="groupType" placeholder="Mini / Economic Light / Family" value="{{ $carro->groupType }}">
                    </div>
                    <div class="form-group">
                        <label for="marca" class="text-white">Marca</label>
                        <input type="text" class="form-control" name="marca" placeholder="Ex. Fiat Punto / Fiat Panda" value="{{ $carro->marca }}">
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="EpocaBaixa" class="text-white">Epoca Baixa</label>
                            <input type="number" class="form-control" name="epocaBaixa" placeholder="€" value="100" value="{{ $carro->epocaBaixa }}">
                        </div>
                        <div class="col-md-3">
                            <label for="EpocaMedia" class="text-white">Epoca Media</label>
                            <input type="number" class="form-control" name="epocaMedia" placeholder="€" value="150" value="{{ $carro->epocaMedia }}"> 
                        </div>
                        <div class="col-md-3">
                            <label for="EpocaMediaAlta" class="text-white">Epoca Media Alta</label>
                            <input type="number" class="form-control" name="epocaMediaAlta" placeholder="€" value="200" value="{{ $carro->epocaMediaAlta }}"> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="EpocaAlta" class="text-white">Epoca Alta</label>
                            <input type="number" class="form-control" name="epocaAlta" placeholder="€" value="250" value="{{ $carro->epocaAlta }}">
                        </div>
                        <div class="col-md-3">
                            <label for="seguro" class="text-white">Seguro contra todos</label>
                            <input type="number" class="form-control" name="seguro" placeholder="€" value="7" value="{{ $carro->seguro }}">
                        </div>
                        <div class="col-md-6">
                            <label for="Transmissao" class="text-white">Transmissão</label>
                            <select class="form-control" name="transmissao" value="{{ $carro->transmissao }}">
                                <option value="AUT">Auto</option>
                                <option value="MAN">Manual</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="lugares" class="text-white">Lugares</label>
                            <select class="form-control" name="lugares" value="{{ $carro->lugares }}"> 
                                @for($i = 1;$i < 10;$i++)
                                    @if($i == $carro->lugares)
                                        <option value="{{$i}}" selected>{{$i}}</option>                                
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="bagagemGr" class="text-white">Bagagem Grande</label>
                            <select class="form-control" name="bagagemGr" value="{{ $carro->bagagemGr }}">
                                @for($i = 1;$i < 10;$i++)
                                    @if($i == $carro->bagagemGr)
                                        <option value="{{$i}}" selected>{{$i}}</option>                                
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="bagagemPq" class="text-white">Bagagem Pequena</label>
                            <select class="form-control" name="bagagemPq" value="{{ $carro->bagagemPq }}">
                                @for($i = 1;$i < 10;$i++)
                                    @if($i == $carro->bagagemPq)
                                        <option value="{{$i}}" selected>{{$i}}</option>                                
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="combustivel" class="text-white">Combustivel</label>
                            <select class="form-control" name="combustivel" value="{{ $carro->combustivel }}">
                                <option value="P">Gasolina</option>
                                <option value="D">Gasoleo</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="arCondicionado" class="text-white">Ar condicionado</label>
                            <select class="form-control" name="arCondicionado" value="{{ $carro->arCondicionado }}">
                                <option value="AC">Sim</option>
                                <option value="No">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="foto" class="text-white">Upload Foto</label>
                            <input type="file" class="form-control-file" name="imagem">
                        </div>
                        <div class="col-md-6">
                            <label for="active" class="text-white">Active</label>
                            <select class="form-control" name="active">
                                @if($carro->active == 0)
                                    <option value="0" selected>Inactive</option>
                                    <option value="1">Active</option>
                                @else
                                    <option value="0">Inactive</option>
                                    <option value="1" selected>Active</option>
                                @endif
                            </select>
                        </div>
                    </div>    
                    <hr class="my-4">
                    <div class="text-center">
                        <p class="text-white">Cuidado !!! Isto vai editar o carro no seu sistema.</p>
                        <input type="submit" class="btn btn-primary btn-lg" role="button" value="Update carro" style="width:100%;">
                    </div>         
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection