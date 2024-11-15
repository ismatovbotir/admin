@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="list-group">
  <a href="{{route('price')}}" class="list-group-item list-group-item-action">
   Печать ценник
  </a>
  <a href="#" class="list-group-item list-group-item-action" aria-disabled="true">...</a>
  <a href="#" class="list-group-item list-group-item-action" aria-disabled="true">...</a>
  <a href="#" class="list-group-item list-group-item-action" aria-disabled="true">...</a>
 
</div> 
        </div>
    </div>
</div>
@endsection
