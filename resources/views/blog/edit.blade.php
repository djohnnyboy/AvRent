@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card border shadow-lg">
                <div class="form-group row">

                    <div class="col-md-6 ">
                        <h1 class="mt-5 text-center">Add New Post</h1>
                        <h5 class="text-center m-5">Cuidado !!!</br> Isto vai criar uma novo blog post no seu sistema.</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-4 text-center">
                            <i class="fas fa-5x fa-plus text-center d-inline m-5"></i>
                            <i class="far fa-10x fa-address-card"></i>
                        </div>
                    </div>

                </div>
                <div class="card-body bg-danger">
                <form method="post" action="{{ route('blog.update', [$post->id]) }}" enctype="multipart/form-data">            
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="text-white">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $post->title }}" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="body" class="text-white">Body</label>
                            <textarea class="form-control" name="body">{{ $post->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="coordinates" class="text-white">Coordinates</label>
                            <input type="text" class="form-control" name="coordinates" value="{{ $post->coordinates }}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="name" class="text-white">Image</label>
                            <input type="file" class="form-control w-100" name="image" value="{{ $post->title }}" />
                        </div>
                    </div>     
                    <hr class="my-4">
                    <div class="text-center">s
                        <p class="text-white">Cuidado !!! Isto vai editar um post novo no teu sistema.</p>
                        <input type="submit" class="btn btn-primary btn-lg" role="button" value="Edit post" style="width:100%;">
                    </div>         
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection