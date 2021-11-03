@extends('layouts.admin')
@section('content')

<div class="container" style="min-height:400px;">
    <div class="row">
        <div class="col-md-12 mt-5"> 
            <div class="card border shadow-lg">
                <div class="card-header cor0 text-white">
                    <h1 class="card-title float-left">Client Messages</h1> 
                    <form method="get" action="{{ route('messages.index') }}" class="form-inline float-right">
                        @csrf
                        <input class="form-control mr-sm-2" type="text" name="search" placeholder="name / email / 2020-01-01" aria-label="Search" style="width:200px;">
                        <button class="btn btn-outline-success btn-primary my-2 my-sm-0 text-white" type="submit">Search</button>
                    </form>
                    
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        @foreach($messages as $message)
                        <div class="card">
                            <div class="card-header" id="heading{{$message->id}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$message->id}}" aria-expanded="false" aria-controls="collapse{{$message->id}}">
                                            <p class="card-text text-muted"><i class="fas fa-2x fa-envelope ml-5 mr-5"></i> Open Message n°{{ $message->id }}</p>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse{{$message->id}}" class="collapse" aria-labelledby="heading{{$message->id}}" data-parent="#accordionExample">
                                <div class="card-body">
                              <!--  <form> -->
                                        <div class="row">
                                            <div class="offset-md-2 col-sm-8 offset-md-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table class="table invoiceBox border shadow-lg">
                                                            <thead class="bg-success text-white">
                                                                <tr>
                                                                    <th scope="col" colspan="3">Message Info:</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Name:</th>
                                                                    <td></td>
                                                                    <td >{{ $message->name ?? ''}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Email:</th>
                                                                    <td></td>
                                                                    <td>{{ $message->email ?? ''}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Message:</th>
                                                                    <td></td>
                                                                    <td>{{ $message->message ?? ''}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Date:</th>
                                                                    <td></td>
                                                                    <td>{{ $message->created_at ?? ''}}</td>
                                                                </tr>
                                                            </tbody>  
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <!--</form> --> 

                                </div>
                            </div>
                        </div><!-- end card foreach -->
                        @endforeach
                    </div><!--end accordion -->

                </div> <!-- end body foreach  -->

                <div class="card-footer text-muted cor1">
                    {{ $messages->links() }}
                </div>

            </div><!--main card  -->
        </div>
    </div>  
</div>
@endsection