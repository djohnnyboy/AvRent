@extends('layouts.admin')
@section('content')

<div class="container" style="min-height:400px;">
    <div class="row">
        <div class="col-md-12 mt-5"> 
            <div class="card border shadow-lg">
                <div class="card-header cor1 text-white">
                    <h1 class="card-title float-left">Client Bookings</h1> 
                    <form method="get" action="{{ route('bookings.index') }}" class="form-inline float-right">
                        @csrf
                        <input class="form-control mr-sm-2" type="text" name="search" placeholder="name / email" aria-label="Search" style="width:200px;">
                        <button class="btn btn-outline-success btn-danger my-2 my-sm-0 text-white" type="submit">Search</button>
                    </form>
                    
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        @foreach($reservas as $reserva)
                        <div class="card">
                            <div class="card-header" id="heading{{$reserva->id}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$reserva->id}}" aria-expanded="false" aria-controls="collapse{{$reserva->id}}">
                                            <p class="card-text text-muted"><i class="fas fa-2x fa-envelope-open-text ml-5 mr-5"></i>Booking n°{{ $reserva->id }}</p>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse{{$reserva->id}}" class="collapse" aria-labelledby="heading{{$reserva->id}}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form> 
                                        <div class="row">
                                            <div class="offset-md-2 col-sm-8 offset-md-2">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table class="table invoiceBox border shadow-lg">
                                                            <thead class="bg-success text-white">
                                                                <tr>
                                                                    <th scope="col" colspan="5">Booking Info:</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">Name:</th>
                                                                    <td></td>
                                                                    <td colspan="2">{{ $reserva->name ?? ''}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Email:</th>
                                                                    <td></td>
                                                                    <td>{{ $reserva->email ?? ''}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Phone:</th>
                                                                    <td></td>
                                                                    <td colspan="2">{{ $reserva->phone ?? '' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Date of Birth:</th>
                                                                    <td></td>
                                                                    <td colspan="2">{{ $reserva->dateOfbirth ?? '' }}</td>
                                                                </tr>
                                                                @isset($reserva->flightNumber)
                                                                <tr>
                                                                    <th scope="row" colspan="2">Flight Information:</th>
                                                                    <td colspan="2">{{ $reserva->flightNumber ?? '' }}</td>
                                                                </tr>
                                                                @endisset
                                                                <tr>
                                                                    <th scope="row" colspan="2">Pick-Up Date:</th>
                                                                    <td colspan="2">{{ $reserva->pickUpDate ?? '' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" colspan="2">Drop-Off Date:</th>
                                                                    <td colspan="2">{{ $reserva->dropOffDate ?? '' }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" colspan="2">Pick-Up Place:</th>
                                                                    @if($reserva->pickUpPlace == 0)
                                                                        <td colspan="2">Hotel Reception € {{ $reserva->pickUpPlace ?? '' }}</td>
                                                                    @else
                                                                        <td colspan="2">Faro Airport € {{ $reserva->pickUpPlace ?? '' }}</td>
                                                                    @endif
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row" colspan="2">Drop-Off Place:</th>
                                                                    @if($reserva->dropOffPlace == 0)
                                                                        <td colspan="2">Hotel Reception € {{ $reserva->dropOffPlace ?? '' }}</td>
                                                                    @else
                                                                        <td colspan="2">Faro Airport € {{ $reserva->dropOffPlace ?? '' }}</td>
                                                                    @endif
                                                                </tr>
                                                                </tbody>
                                                                <thead class="thead-dark">
                                                                    <tr>
                                                                        <th scope="col" colspan="2">Extras</th>
                                                                        <th scope="col"></th>
                                                                        <th scope="col"></th>
                                                                        <th scope="col"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                @if($reserva->fullInsurance == null)
                                                                    <tr>
                                                                        <th scope="row" colspan="2">Basic Insurance</th>
                                                                        <td >
                                                                            € Free
                                                                        </td>
                                                                    </tr>       
                                                                @else
                                                                    <tr>
                                                                        <th scope="row" colspan="2">Full Insurance</th>
                                                                        <td >
                                                                            € {{ $reserva->fullInsurance }}
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                                @isset($reserva->spainInsurance)
                                                                    <tr>
                                                                        <th scope="row" colspan="2">Spain Insurance</th>
                                                                        <td >
                                                                            € 25
                                                                        </td>
                                                                    </tr>       
                                                                @endisset
                                                                @isset($reserva->gps)
                                                                    <tr>
                                                                        <th scope="row" colspan="2">Gps</th>
                                                                        <td >
                                                                            € 30
                                                                        </td>
                                                                    </tr>       
                                                                @endisset
                                                                @if($reserva->extraDriver !== 0)
                                                                    <tr>
                                                                        <th scope="row" colspan="2">Extra Driver</th>
                                                                        <td >
                                                                            € {{ $reserva->extraDriver }}
                                                                        </td>
                                                                    </tr>  
                                                                @elseif($reserva->extraDriver == 0)
                                                                    <tr>
                                                                        <th scope="row" colspan="2">Extra Driver</th>
                                                                        <td >
                                                                            € Free
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                                @if($reserva->childTodlerSeats !== 0)
                                                                    <tr>
                                                                        <th scope="row" colspan="2">Child Todler Seats</th>
                                                                        <td >
                                                                            € {{ $reserva->childTodlerSeats }}
                                                                        </td>
                                                                    </tr> 
                                                                @endif
                                                                @if($reserva->childInfantSeats !== 0)
                                                                    <tr>
                                                                        <th scope="row" colspan="2">Child Infant Seats</th>
                                                                        <td >
                                                                            € {{ $reserva->childInfantSeats }}
                                                                        </td>
                                                                    </tr> 
                                                                @endif
                                                                @if($reserva->childBoosterSeats !== 0)
                                                                    <tr>
                                                                        <th scope="row" colspan="2">Child Booster Seats</th>
                                                                        <td >
                                                                            € {{ $reserva->childBoosterSeats }}
                                                                        </td>
                                                                    </tr> 
                                                                @endif
                                                                @isset($reserva->textArea)
                                                                    <tr>
                                                                        <th scope="row" colspan="2">Coments or Other Requirements:</th>
                                                                        <td>
                                                                            {{ $reserva->textArea }}
                                                                        </td>
                                                                    </tr>
                                                                @endisset
                                                                    <tr>
                                                                        <th scope="row" colspan="2">Booking date:</th>
                                                                        <td  colspan="3">
                                                                            {{ $reserva->created_at }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row" colspan="2" class="bg-danger text-white">Total Price:</th>
                                                                        <td class="bg-danger text-white" colspan="3">
                                                                            € {{ $reserva->preco }}
                                                                        </td>
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

                <div class="card-footer text-muted cor0">
                    {{ $reservas->links() }}
                </div>

            </div><!--main card  -->
        </div>
    </div>  
</div>
@endsection