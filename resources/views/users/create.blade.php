@extends('layouts.app')

@section('title')
Todo: Đăng ký
@endsection

@section('content')
    <div class="container">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>   
                @endforeach
            </ul>
        </div>
    @endif
        <div id ="user-register" class="row justify-content-center">
            <div class="col-md-4 col-xs-4 col-md-offset-4 col-xs-offset-4">
                <form action="/registers-todo" method="post">
                    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->  <!-- sử dụng thẻ input tạo bảo mật csrf -->
                    <!-- {{csrf_field()}} --> <!-- gọi trường helper function -->
                    @csrf
                    <div class="form-group">
                        <span>Tên người dùng</span>
                        <input type="text" class="form-control" name = "name" placeholder="Nhập tên người dùng" autofocus>
                    </div>
                    <div class="form-group">
                        <span>Tài khoản</span>
                        <input type="text" class="form-control" name = "user" placeholder="Nhập tên tài khoản">
                    </div>
                    <div class="form-group">
                        <span>Mật khẩu</span><input type="password" class="form-control" name = "pass" placeholder="Nhập tên mật khẩu">
                    </div>
                    <div class="form-group">
                        <span>Nhập lại mật khẩu</span><input type="password" class="form-control" name = "re-pass" placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="form-group">
                        <span>Email</span>
                        <input type="text" class="form-control" name = "email" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-primary" type = "submit">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection