@extends('layouts.app')

@section('contentBody')

<div class="nk-content-body">
    <div class="components-preview wide-md mx-auto">


        <div class="nk-block nk-block-lg">
        <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between" >
                    <div>Ready</div>
                    <div>
                        
                    </div>
                </div>

                <div class="card-body">
                <div class="table-responsive">      
                <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Оператор</th>
                                <th scope="col">Коммент</th>
                                <th scope="col">Опер</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{$order['id']}}</th>
                                <td>{{$order["created_at"]}}</td>
                                <td>{{$author}}</td>
                                <td>
                                    <p>{{$order['items_count']}} ta qator</p>
                                    <p>{{$order['status']}}</p>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                       
                                        <a type="button" class="btn btn-warning" href="{{route('ready.show',['id'=>$order['id']])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
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
    </div> 
        </div><!-- .nk-block -->

    </div><!-- .components-preview -->
</div>





@endsection
