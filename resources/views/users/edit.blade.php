@extends('layouts.app')

@section('contentBody')


<div class="nk-content-body">
    <div class="components-preview wide-md mx-auto">


        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="title nk-block-title">Editing User: {{$user->name}}</h4>
                    <div class="nk-block-des">
                        <p>Fill the fields in order create new User</p>
                    </div>
                </div>
            </div>
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-head">
                        <h5 class="card-title">User INFO</h5>
                    </div>
                    <form action="{{route('users.update',['user'=>$user->id])}}" method="POST">
                        @csrf

                        <div class="row g-4">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label" for="email-address-1">Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label" for="email-address-1">Email address</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-label" for="phone-no-1">Password</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">

                                    <label class="form-label" for="default-06">Role</label>
                                    <div class="form-control-wrap ">
                                        <div class="form-control-select">
                                            <select class="form-control" id="role" name="role" value="{{$user->role_id}}">
                                            <option value="0"></option>
                                                @foreach($roles as $role)
                                                    @if($role->id==$user->role_id)
                                                        <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                    @else
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">

                                    <label class="form-label" for="default-06">Shop</label>
                                    <div class="form-control-wrap ">
                                        <div class="form-control-select">
                                            <select class="form-control" id="shop" name="shop">
                                            <option value="0"></option>
                                                @foreach($shops as $shop)
                                                    @if($shop->id==$user->shop_id)
                                                        <option value="{{$shop->id}}" selected>{{$shop->shop_name}}</option>
                                                    @else
                                                        <option value="{{$shop->id}}">{{$shop->shop_name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-primary">Update User</button>
                                </div>
                            </div>


                        </div>

                        <div class="row g-1 pt-2">
                            @if($errors->any())

                            <div class="col">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>
                                            {{$error}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>


                    </form>
                </div>
            </div>
        </div><!-- .nk-block -->

    </div><!-- .components-preview -->
</div>

@endsection