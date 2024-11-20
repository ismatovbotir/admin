@extends('layouts.app')

@section('contentBody')
    
<div class="nk-content-body">
    <div class="components-preview wide-md mx-auto">
        <div class="nk-block nk-block-lg">
        @if($content=='home')
            <div class="card">
                <div class="card-header">
                    <form action="{{route('price.item')}}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="barcode"  name="barcode" autofocus>
                            <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0z"/>
                                </svg>
                            </button>
                            @if(count($tableData)>0)
                             <a href="{{route('price.load1c')}}" class="btn btn-outline-warning" type="button" id="button-addon2">1c
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
                @if(count($tableData)>0)
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Maxsulot</th>
                                <th scope="col">Miqdor</th>
                                <th scope="col">Narx</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($tableData as $tableItem)
                            <tr>
                                <th scope="row">
                                    <a class='btn btn-danger' href="{{route('price.dell.item',['id'=>$tableItem->id])}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                    </a>
                                </th>
                                <td>{{$tableItem->name}}</td>
                                <td>{{$tableItem->qty}}</td>
                                <td>{{$tableItem->price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            @else
            <div class="card border-danger mb-3" style="max-width: 24rem;">
                <div class="card-header">Info</div>
                <div class="card-body text-danger">
                    <h5 class="card-title">Administrator!!!!</h5>
                    <p class="card-text">Sizning profilingizga supermarket biriktirilmagan ekan</p>
                </div>
            </div>
        @endif
        </div><!-- .nk-block -->

    </div><!-- .components-preview -->
</div>
@endsection
