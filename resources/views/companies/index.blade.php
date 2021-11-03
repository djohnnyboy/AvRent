@extends('layouts.admin')
@section('content')


<h1 class="text-center mt-5">All Companies</h1>

<div class="container mt-5">
  <div class="jumbotron text-center">
  
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Nif</th>
          <th scope="col">Active</th>
          <th scope="col">edit</th>
          <th scope="col">delete</th>
        </tr>
      </thead>
      <tbody>
      @foreach($companies as $company)
        <tr>
          <th scope="row">1</th>
          <td>{{ $company->name }}</td>
          <td>{{ $company->email }}</td>
          <td>{{ $company->phone }}</td>
          <td>{{ $company->nif }}</td>
          @if($company->active == 0)
            <td>Inactive</td>
          @else
            <td>Active</td>
          @endif
          <td>
              <a href="/companies/{{ $company->id }}/edit" class=" btn btn-info form-control">Edit</a> 
          </td>
          <td>
          <a href="#" class="btn btn-danger w-75" onclick="
              let result = confirm('Are you sure you wanna delete the company?');
              if(result){
                  event.preventDefault();
                  document.getElementById('delete-form').submit();
              }
              ">
                  Delete
              </a>
              <form id="delete-form" action="{{route('companies.destroy',[$company->id])}}" method="post" style="display: none">
                  <input type="hidden" name="_method" value="delete" />
                  @csrf
              </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    
  </div>
</div>

@endsection