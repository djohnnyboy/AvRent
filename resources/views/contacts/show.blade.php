@extends('layouts.fleet')
@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-12">
            <div class="jumbotron topper shadow-sm">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-4">@lang('contacts.thankMessageTitle')</h1>
                        <p class="lead">@lang('contacts.thankMessageSubTitle')</p>
                        <hr class="my-4">
                        <a class="btn btn-primary btn-lg shadow-lg" href="tel:00351966972041" role="button">@lang('contacts.callNow') 966972041</a>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection