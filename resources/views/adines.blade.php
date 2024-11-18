@extends('layouts.app');

@section('contentBody')

<div class="form-group">
    <label class="form-label" for="default-01">Name</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="default-01" placeholder="Input placeholder" value="{{$adines->name}}" disabled>
    </div>
</div>
<div class="form-group">
    <label class="form-label" for="default-01">Adress</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="default-01" placeholder="Input placeholder" value="{{$adines->adress}}" disabled>
    </div>
</div>
<div class="form-group">
    <label class="form-label" for="default-01">Login</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="default-01" placeholder="Input placeholder" value="{{$adines->login}}" disabled>
    </div>

</div>
<div class="form-group">
    <label class="form-label" for="default-01">Password</label>
    <div class="form-control-wrap">
        <input type="text" class="form-control" id="default-01" placeholder="Input placeholder" value="{{$adines->password}}" disabled>
    </div>
</div>


@endsection