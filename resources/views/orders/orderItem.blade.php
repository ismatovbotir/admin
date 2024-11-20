@extends('layouts.app')

@section('contentBody')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>Заказ №: {{$id}}</div>


                </div>

                <div class="card-body">
                    @if ($role=='order')
                    <form method="post" action="{{route('orderAddItem',['id'=>$id])}}" class="row row-cols-lg-auto g-3 align-items-center"  >
                    @elseif($role=='collect')
                    <form method="post" action="{{route('collectAddItem',['id'=>$id])}}" class="row row-cols-lg-auto g-3 align-items-center"  >
                    @endif
                        <div class="col-12">
                            <h2>{{$data['name']}}</h2>
                           
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <div class="col-4">
                                <input type="text" disabled class="form-control" id="code" name="code" value="{{$data['code']}}" >  
                                <input type="hidden" class="form-control" id="code" name="code" value="{{$data['code']}}" >    
                            </div>
                            <div class="col-7">
                                @if ($role=='Order')
                                <input type="number" class="form-control" id="qty" name="qty" placeholder="{{$data['qty']}}" autofocus>
                                @elseif($role=='Collect')
                                <input type="number" class="form-control" id="qty" name="qty" placeholder="{{$data['qty']}}-{{$data['qty_done']}}" value="{{$data['qty']}}" autofocus>
                                @endif
                                <input type="hidden"  name="name" value="{{$data['name']}}">
                                <input type="hidden"  name="barcode" value="{{$data['barcode']}}">   
                            </div> 
                        </div>
                        <div class="d-flex justify-content-around">

                            <a type="button" class="btn btn-danger" href="{{route('orders.show',['id'=>$id])}}">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-success">
                                Add
                            </button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection