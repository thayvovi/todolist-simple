@extends('layouts.app')

@section('title')
    Single: Sửa thông tin người dùng
@endsection
@section('content')
    <div class="container" id="user-edit">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-4 col-xs-4 col-md-offset-4 col-xs-offset-4">
                <form action="/user/{{$id->id}}/update-user" method="post" enctype="multipart/form-data">
                
                    @csrf
                    <div class="form-group">
                        <span>Tên người dùng</span>
                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" autofocus>
                    </div>
                    <div class="form-group">
                        <span>Email</span>
                        <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
                    </div>
                    <div class="form-group">
                        <span>Tài khoản đăng nhập</span>
                        <input type="text" class="form-control" name="user" value="{{Auth::user()->user}}" disabled>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary">Cập nhật thông tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection