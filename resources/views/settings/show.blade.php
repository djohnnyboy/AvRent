@extends('layouts.admin')
@section('content')
    <div class="container cor1 rounded mt-3 shandow-lg border">
    <h1 class="text-center text-white pt-4">Settings / Extras</h1>
        <div class="row" style="background-color:white;">
            <div class="col-md-12 border shadow-lg">
            @isset($settings)
            <div class="form-group mt-5">
                        <label for="email">Bookings / Messages email</label>
                        <p class="cemCento border rounded p-1"><span class="ml-2">{{ $settings->email ?? '' }}</span></p>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="spainInsurance">Spain Insurance</label>
                            <p class="cemCento border rounded p-1"><span class="ml-2">{{ $settings->spainInsurance ?? '' }}</span></p>
                        </div>
                        <div class="col-md-4">
                            <label for="gps">Gps</label>
                            <p class="cemCento border rounded p-1"><span class="ml-2">{{ $settings->gps ?? '' }}</span></p>
                        </div>
                        <div class="col-md-4">
                            <label for="extraDriver">Extra Driver</label>
                            <p class="cemCento border rounded p-1"><span class="ml-2">{{ $settings->extraDriver  ?? '' }}</span></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="todlerSeat">Todler Seat</label>
                            <p class="cemCento border rounded p-1"><span class="ml-2">{{ $settings->todlerSeat  ?? '' }}</span></p>
                        </div>
                        <div class="col-md-4">
                            <label for="infantSeat">Infant Seat</label>
                            <p class="cemCento border rounded p-1"><span class="ml-2">{{ $settings->infantSeat  ?? '' }}</span></p>
                        </div>
                        <div class="col-md-4">
                            <label for="boosterSeat">Booster Seat</label>
                            <p class="cemCento border rounded p-1"><span class="ml-2">{{ $settings->boosterSeat  ?? '' }}</span></p>
                        </div>
                    </div> 
            <!--
                <table class="table invoiceBox border shadow-lg mt-5">
                    <thead class="bg-danger text-white">
                        <tr>
                            <th scope="col" colspan="2">Settings / Extras Info</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <th scope="row">Bookings / messages - Email:</th>
                            <td colspan="2">{{ $settings->email ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Spain Insurance:</th>
                            <td colspan="2">{{ $settings->spainInsurance ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Gps:</th>
                            <td colspan="2">{{ $settings->gps ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Extra Driver:</th>
                            <td colspan="2">{{ $settings->extraDriver ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Todler Seat:</th>
                            <td colspan="2">{{ $settings->todlerSeat ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Infant Seat:</th>
                            <td colspan="2">{{ $settings->infantSeat ?? ''}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Booster Seat:</th>
                            <td colspan="2">{{ $settings->boosterSeat ?? ''}}</td>
                        </tr>
                    </tbody>
                </table>
-->
            @endisset
            </div>
        </div>
    </div>
@endsection