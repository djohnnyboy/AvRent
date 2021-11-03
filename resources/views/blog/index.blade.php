@extends('layouts.admin') 
@section('content')

<h1 class="text-center mt-5">All Blog Posts</h1>

<div class="container mt-5">
  <div class="jumbotron text-center">
  
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Image</th>
          <th scope="col">Title</th>
          <th scope="col">Body</th>   
          <th scope="col">edit</th>
          <th scope="col">delete</th>
        </tr>
      </thead>
      <tbody>
      @isset($posts)
        @foreach($posts as $post)
          <tr>
            <th scope="row">{{ $post->id }}</th>
            <td><img src="{{ Storage::url($post->image) }}" class="card-img-top" alt="postImage"></td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>    
            <td>
                <a href="/blog/{{ $post->id }}/edit" class=" btn btn-info form-control">Edit</a> 
            </td>
            <td>
            <a href="#" class="btn btn-danger w-75" onclick="
                let result = confirm('Are you sure you wanna delete this post ?');
                if(result){
                    event.preventDefault();
                    document.getElementById('delete-form').submit();
                }
                ">
                    Delete 
                </a>
                <form id="delete-form" action="{{route('blog.destroy',[$post->id])}}" method="post" style="display: none">
                    <input type="hidden" name="_method" value="delete" />
                    @csrf
                </form>
            </td>
          </tr>
        @endforeach
      @endisset
      </tbody>
    </table>
    
  </div>
</div>
@endsection