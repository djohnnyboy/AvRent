@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card border shadow-lg">
                <div class="form-group row">
                    <div class="col-md-6 ">
                        <h1 class="mt-5 text-center">Add New Car</h1>
                        <h5 class="text-center m-5">Cuidado !!!</br> Isto vai criar um carro novo no teu sistema.</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-4 text-center">
                            <i class="fas fa-5x fa-plus text-center d-inline m-5"></i>
                            <i class="fas fa-10x fa-car text-center d-inline"></i>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-danger">
                <form method="post" action="{{ route('carros.store') }}" enctype="multipart/form-data">            
                    @csrf
                    <div class="form-group">
                        <label for="grupo" class="text-white">Insere Grupo</label>
                        <input type="text" class="form-control" name="groupType" placeholder="Mini / Economic Light / Family">
                    </div>
                    <div class="form-group">
                        <label for="marca" class="text-white">Marca</label>
                        <input type="text" class="form-control" name="marca" placeholder="Ex. Fiat Punto / Fiat Panda">
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="EpocaBaixa" class="text-white">Epoca Baixa</label>
                            <input type="number" class="form-control" name="epocaBaixa" placeholder="€" value="100">
                        </div>
                        <div class="col-md-3">
                            <label for="EpocaMedia" class="text-white">Epoca Media</label>
                            <input type="number" class="form-control" name="epocaMedia" placeholder="€" value="150"> 
                        </div>
                        <div class="col-md-3">
                            <label for="EpocaMediaAlta" class="text-white">Epoca Media Alta</label>
                            <input type="number" class="form-control" name="epocaMediaAlta" placeholder="€" value="200"> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="EpocaAlta" class="text-white">Epoca Alta</label>
                            <input type="number" class="form-control" name="epocaAlta" placeholder="€" value="250">
                        </div>
                        <div class="col-md-3">
                            <label for="seguro" class="text-white">Seguro contra todos</label>
                            <input type="number" class="form-control" name="seguro" placeholder="€" value="7">
                        </div>
                        <div class="col-md-6">
                            <label for="Transmissao" class="text-white">Transmissão</label>
                            <select class="form-control" name="transmissao">
                                <option value="AUT">Auto</option>
                                <option value="MAN">Manual</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="lugares" class="text-white">Lugares</label>
                            <select class="form-control" name="lugares">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="bagagemGr" class="text-white">Bagagem Grande</label>
                            <select class="form-control" name="bagagemGr">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="bagagemPq" class="text-white">Bagagem Pequena</label>
                            <select class="form-control" name="bagagemPq">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="combustivel" class="text-white">Combustivel</label>
                            <select class="form-control" name="combustivel">
                                <option value="P">Gasolina</option>
                                <option value="D">Gasoleo</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="arCondicionado" class="text-white">Ar condicionado</label>
                            <select class="form-control" name="arCondicionado">
                                <option value="AC">Sim</option>
                                <option value="NO">Não</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="foto" class="text-white">Upload Foto carro</label>
                            <input type="file" class="form-control-file" name="imagem">
                        </div>
                        <div class="col-md-6">
                            <label for="active" class="text-white">Active</label>
                            <select class="form-control" name="active">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>    
                    <hr class="my-4">
                    <div class="text-center">
                        <p class="text-white">Cuidado !!! Isto vai criar um carro novo no teu sistema.</p>
                        <input type="submit" class="btn btn-primary btn-lg" role="button" value="Criar carro novo" style="width:100%;">
                    </div>         
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection