@extends('layouts.app')

@section('contentBody')


<div class="nk-content-body">
    <div class="components-preview wide-md mx-auto">


        <div class="nk-block nk-block-lg">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="d-block ">Сборка №: {{$order->id}}</div>
                            <div>
                                <form action="{{route('orders.check.item',['id'=>$id])}}" class="row g-3" method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="barcode" autofocus>
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                            </svg>
                                        </button>
                                    </div>
                                    @csrf
                                </form>
                            </div>
                            <div>
                              
                                <a class="btn btn-outline-success" href="{{route('collects.status',['id'=>$id,'status'=>'ready'])}}" role="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                    </svg>
                                </a>
                              
                                <a href="{{route('collects.index')}}" class="btn btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped ">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Код</th>
                                            <th scope="col">Наименование</th>
                                            <th scope="col">К-во</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderItems as $orderItem)
                                        <tr>
                                            <th scope="row">{{$orderItem['id']}}</th>
                                            <td>{{$orderItem['code']}}</td>

                                            <td>
                                                <p>{{$orderItem['name']}}</p>
                                                <p>{{$orderItem['barcode']}}</p>
                                            </td>
                                            <td>
                                                {{$orderItem['qty']}}
                                                @if($role!=='order')
                                                -{{$orderItem['qty_done']}}
                                                @endif


                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                   
                                                    <a class='btn btn-success' href="{{route('collects.edit.item',['id'=>$orderItem['id']])}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                        </svg>
                                                    </a>
                                                  
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @if($errors->any())
                <div class="alert alert-danger" role="alert">


                    {{$errors->first()}}


                </div>
                @endif
            </div><!-- .nk-block -->

        </div><!-- .components-preview -->
    </div>
</div>





@endsection