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
    </tr>
  </thead>
  <tbody>
    @foreach($users as $idx=>$user)
    <tr>
      <th scope="row">{{$idx}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
 
      <td>{{$user->role}}</td>
      <td>{{$user->shop}}</td>
    </tr>
    
  </tbody>
</table>

@endsection