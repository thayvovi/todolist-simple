@extends('layouts.app')

@section('title')
Single: Change password
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
        @if(session('tb-danger'))
            <div class="alert alert-danger">
                {{session('tb-danger')}}
            </div>
        @elseif(session('tb-success'))
            <div class="alert alert-success">
                {{session('tb-success')}}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-4 col-xs-4 col-md-offset-4 col-xs-offset-4">
                <form action="/user/{{Auth::user()->id}}/update-password" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Mật khẩu cũ</label>
                        <input type="password" class="form-control" name="passold" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu mới</label>
                        <input type="password" class="form-control" name="passnew">
                    </div>
                    <div class="form-group">
                        <label for=""> Nhập lại mật khẩu mới</label>
                        <input type="password" class="form-control" name="re-passnew">
                    </div>
                    <div class="text-center form-group">
                        <button type="submit" class="btn btn-primary">Thay đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection