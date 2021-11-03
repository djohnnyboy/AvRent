@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card border shadow-lg">
                <div class="form-group row">

                    <div class="col-md-6 ">
                        <h1 class="mt-5 text-center">Edit Company</h1>
                        <h5 class="text-center m-5">Cuidado !!!</br> Isto vai editar uma companhia no seu sistema.</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-4 text-center">
                            <i class="fas fa-5x fa-plus text-center d-inline m-5"></i>
                            <i class="fas fa-10x fa-copyright"></i>
                        </div>
                    </div>

                </div>
                <div class="card-body bg-danger">
                <form method="post" action="{{ route('companies.update', [$company->id] ) }}" enctype="multipart/form-data">            
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="name" class="text-white">Name</label>
                            <input class="form-control" name="name" value="{{ $company->name }}"/>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="text-white">Email</label>
                            <input class="form-control" name="email" value="{{ $company->email }}"/>
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class="text-white">Phone</label>
                            <input class="form-control" name="phone" value="{{ $company->phone }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="nif" class="text-white">Nif</label>
                            <input class="form-control" name="nif"value="{{ $company->nif }}" />
                        </div>
                        <div class="col-md-6">
                            <label for="active" class="text-white">Active</label>
                            <select class="form-control" name="active">
                                @if($company->active == 0)
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
                    <div class="text-center">s
                        <p class="text-white">Cuidado !!! Isto vai editar uma companhia no teu sistema.</p>
                        <input type="submit" class="btn btn-primary btn-lg" role="button" value="Edit company" style="width:100%;">
                    </div>         
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection