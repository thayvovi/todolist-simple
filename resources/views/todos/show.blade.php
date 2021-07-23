@extends('layouts.app')

@section('title')
    Single Todo: {{$todo->name}}
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Description: {{$todo->name}}</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header"><a href="/todos" class="btn btn-primary float-left mr-2">Back<span class="sr-only">(current)</span></a>
                    <a href="/todos/{{$todo->id}}/delete" class="btn btn-danger float-right mr-2">Delete</a>
                        <a href="/todos/{{$todo->id}}/edit" class="btn btn-success float-right mr-2">Sửa</a>
                    </div>
                    <div class="card-body">
                        <div><h3>Nội dung</h3>{{$todo->description}}</div>
                        <div><h3>Hình ảnh công việc</h3><img src="../images/{{$todo->images}}" width="100px" height="100px" alt="{{$todo->name}}"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--tạo form nội dung-->
@endsection