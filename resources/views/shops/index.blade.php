@extends('layouts.app');

@section('contentBody')
<div class="mb-2">
<a href="{{route('shops.update')}}" class="btn btn-dim btn-outline-primary">Update</a>
</div>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">WareHouse</th>
      <th scope="col">WareCode</th>
      <th scope="col">Price</th>
      <th scope="col">PriceCode</th>
     
    </tr>
  </thead>
  <tbody>
    @foreach($shops as $idx=>$shop)
    <tr>
      <th scope="row">{{$idx}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
 
      <td>{{$user->role}}</td>
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

</div>


@endsection