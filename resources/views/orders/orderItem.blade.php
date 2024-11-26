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

                    <form method="post" action="{{route('orders.add.item',['id'=>$id])}}" class="row row-cols-lg-auto g-3 align-items-center">

                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="preview-block">
                                    <span class="preview-title-lg overline-title">{{$data['name']}}</span>
                                    <div class="row gy-4">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label" for="default-01">Code:</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="default-01" value="{{$data['code']}}" disabled>
                                                    <input type="hidden" class="form-control" name="code" value="{{$data['code']}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label" for="default-05">Stock:</label>
                                                <div class="form-control-wrap">

                                                    <input type="text" class="form-control" id="default-05" value="{{$data['qty']}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="form-label" for="default-03">Qty:</label>
                                                <div class="form-control-wrap">

                                                    <input type="number" name="qty" class="form-control" id="default-03" autofocus>
                                                    <input type="hidden" name="name" value="{{$data['name']}}">
                                                    <input type="hidden" name="barcode" value="{{$data['barcode']}}">

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label" for="default-textarea">Comment</label>
                                                <div class="form-control-wrap">
                                                    <textarea class="form-control no-resize" id="default-textarea" name="comment"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group d-flex justify-content-around">
                                                <a type="button" class="btn btn-dim btn-outline-danger" href="{{route('orders.show',['id'=>$id])}}">
                                                    Cancel
                                                </a>
                                                <button type="submit" class="btn btn-dim btn-outline-success">
                                                    Add
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>



                        {{--<div class="col-12">
                            <h2>{{$data['name']}}</h2>

                </div>
                <div class="col-12 d-flex justify-content-between">
                    <div class="col-4">
                        <input type="text" disabled class="form-control" id="code" name="code" value="{{$data['code']}}">
                        <input type="text" disabled class="form-control" id="stock" value="Ост: {{$data['qty']}}">
                        <input type="hidden" class="form-control" id="code" name="code" value="{{$data['code']}}">
                    </div>
                    <div class="col-7">

                        <input type="number" class="form-control" id="qty" name="qty" placeholder="{{$data['qty']}}" autofocus>
                        <input type="hidden" name="name" value="{{$data['name']}}">
                        <input type="hidden" name="barcode" value="{{$data['barcode']}}">
                        <input type="text" name="comment">
                    </div>
                </div>
                <div class="d-flex justify-content-around">

                    <a type="button" class="btn btn-danger" href="{{route('orders.show',['id'=>$id])}}">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-success">
                        Add
                    </button>
                </div>--}}
                @csrf
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection