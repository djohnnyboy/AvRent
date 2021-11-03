@extends('layouts.fleet') 
@section('content')

<h1 style="margin-top:100px;" class="text-center">Tours</h1>
<hr />
<div class="container">
<div class="row">
    @foreach($posts as $post) 
        <div class="col-md-4">
            <div class="card">
                <img src="{{ Storage::url($post->image) }}" class="card-img-top" alt="postImage">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text posts">{{ $post->body }}</p>
                    <p>..........<a href="/tours/{{ $post->id }}" >Read more now</a></p> 
                </div>
            </div>
        </div>
    @endforeach
     </div>
</div>    
@endsection