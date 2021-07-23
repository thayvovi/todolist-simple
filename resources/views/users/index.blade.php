@extends('layouts.app')

@section('title')
    Đăng Nhập
@endsection

@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('thong bao')) {{-- xem tồn tại thông báo ở session không --}}
            <div class="alert alert-danger">
                {{session('thong bao')}}
            </div>
        @endif
        <div id ="user-index"class="row justify-content-center">
            <div class="col-xs-4 col-md-4 col-xs-offset-4 col-md-offset-4">
                <form method="post" enctype = "multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="user">Tài khoản</label>
                        <input type="text" name="user" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="pass">Mật khẩu</label>
                        <input type="password" name="pass" class="form-control">
                    </div>
                    <div id="btn-submit" class="form-group">
                        <button type="submit" class="form-control btn btn-primary">Đăng nhập</button>
                    </div>
                </form>
                <div class="links">
                    <p>Nếu chưa có tài khoản, hãy ấn <a href="/registers" style="margin-left: 2px;"> Đăng ký ngay</a></p>
                    <p>Nếu quên mật khẩu ấn <a href="/re-pass" style="margin-left: 2px;"> Lấy lại mật khẩu</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection