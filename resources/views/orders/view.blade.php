@extends('layouts.app')

@section('contentBody')


<div class="nk-content-body">
    <div class="components-preview wide-md mx-auto">


        <div class="nk-block nk-block-lg">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="d-block ">Заказ №: {{$order->id}}</div>
                            
                            <div>
                               
                                <a href="{{route('orders.index')}}" class="btn btn-outline-danger">
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
                                            <th scope="col">Коммент</th>
                                            
                                           
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
                                               
                                                @if(count($orderItem['comments'])>0)
                                                {{$orderItem['comments'][count($orderItem['comments'])-1]['comment']}}
                                                @endif


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