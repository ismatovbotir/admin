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
      <th scope="row">{{$idx+1}}</th>
      <td>{{$shop->shop_name}}</td>
      <td>{{$shop->shop_code}}</td>
 
      <td>{{$shop->price_name}}</td>
      <td>{{$shop->price_code}}</td>
      
    </tr>
    @endforeach
  </tbody>
</table>

</div>


@endsection