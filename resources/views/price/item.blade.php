@extends('layouts.app')

@section('contentBody')

<div class="nk-content-body">
    <div class="components-preview wide-md mx-auto">


        <div class="nk-block nk-block-lg">
            <div class="card">
                <div class="card-header">
                    {{$data['name'] }} - {{ $data['qty']}}
                </div>
                <div class="card-body">
                    <form action="{{route('price.add.item')}}" method="GET">
                        <h1 class="card-title">{{$data['price']}}</h1>
                        <p class="card-text">Etiketkadagi narx bilan tenglashtirib koring va</p>
                        <input type="text"  value="{{$data['qty']}}" disabled>
                        <input type="text" name="code" value="{{$data['code']}}" hidden>
                        <input type="text" name="price" value="{{$data['price']}}" hidden>
                        <input type="text" name="barcode" value="{{$data['barcode']}}" hidden>
                        <input type="text" name="name" value="{{$data['name']}}" hidden>
                        <input type="number" name="qty" placeholder="Qty of pricetag"><br>
                        <a href="{{route('price.index')}}" class="btn btn-success">Narx To'g'ri</a>
                        <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                            </svg>
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection