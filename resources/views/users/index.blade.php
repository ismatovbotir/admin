@extends('layouts.app');

@section('contentBody')
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">Role</th>
      <th scope="col">Shop</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $idx=>$user)
    <tr>
      <th scope="row">{{$idx+1}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
 
      <td>{{$user->role->name}}</td>
      <td>{{$user->shop}}</td>
      <td>
        <div class="btn-group" aria-label="Basic example">
            <a href="{{route('users.edit',['id'=>$user->id])}}" type="button" class="btn btn-primary">Edit</a>
            <a type="button" class="btn btn-danger">Delete</a>
            
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection