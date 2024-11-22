@extends('layouts.app')

@section('contentBody')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>Сборка №: {{$id}}</div>


                </div>

                <div class="card-body">
                    
                    <form method="post" action="{{route('orders.add.item',['id'=>$id])}}" class="row row-cols-lg-auto g-3 align-items-center"  >
                    
                        <div class="col-12">
                            <h2>{{$data['name']}}</h2>
                           
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <div class="col-4">
                                <input type="text" disabled class="form-control" id="code" name="code" value="{{$data['code']}}" >  
                                <input type="text" disabled class="form-control" id="stock"  value="Ост: {{$data['qty']}}" >
                                <input type="hidden" class="form-control" id="code" name="code" value="{{$data['code']}}" >      
                            </div>
                            <div class="col-7">
                                
                                <input type="number" class="form-control" id="qty" name="qty" placeholder="{{$data['qty']}}" autofocus>
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