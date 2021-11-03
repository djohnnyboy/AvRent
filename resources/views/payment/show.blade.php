@extends('layouts.fleet')
@section('content')
<section aria-label="breadcrumb" style="margin-top:95px;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="http://localhost:8000">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">404 error</li>
    </ol>
</section>
<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">404 page not found!</h1>
                <p class="lead">There was an internal server error.</p>
                <hr class="my-4">
                <p>Please return to the homepage below.</p>
                <a class="btn btn-primary btn-lg" href="{{ url('/') }}" role="button">Home page</a>
            </div>
        </div>
    </div>
</div>

@endsection