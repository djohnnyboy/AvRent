@extends('layouts.admin')
@section('content')
    <div class="container cor0 rounded mt-5 shandow-lg border">
    <h1 class="text-center text-white pt-4">Settings / Extras</h1>
        <div class="row" style="background-color:white;">
            <div class="col-md-12 border shadow-lg">
                <form method="post" action="{{  route('settings.update', [$setting->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-5">
                        <label for="email">Bookings / Messages email</label>
                        <input type="email" value="{{ $setting->email ?? '' }}" name="email" class="form-control" required>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="spainInsurance">Spain Insurance</label>
                            <input type="number" value="{{ $setting->spainInsurance ?? '' }}" name="spainInsurance" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="gps">Gps</label>
                            <input type="number" value="{{ $setting->gps ?? '' }}" name="gps" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="extraDriver">Extra Driver</label>
                            <input type="number" value="{{ $setting->extraDriver  ?? '' }}" name="extraDriver" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="todlerSeat">Todler Seat</label>
                            <input type="number" value="{{ $setting->todlerSeat  ?? '' }}" name="todlerSeat" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="infantSeat">Infant Seat</label>
                            <input type="number" value="{{ $setting->infantSeat  ?? '' }}" name="infantSeat" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="boosterSeat">Booster Seat</label>
                            <input type="number" value="{{ $setting->boosterSeat  ?? '' }}" name="boosterSeat" class="form-control" required>
                        </div>
                        <div class="col-md-12 mt-3">
                            <input type="submit" value="Save" class="btn btn-primary" style="width:100%;">
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
@endsection