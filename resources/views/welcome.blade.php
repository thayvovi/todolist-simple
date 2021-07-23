@extends('layouts.app')

@section('title')
    Trang chủ Todo
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Công việc gần nhất</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        TODOS
                        <a href="/news-todo" class="btn btn-primary btn-sm float-right mr-2">Create</a>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                                @foreach($todos as $todo)
                                    <li class="list-group-item">
                                        <a href="/todos/{{$todo->id}}">{{$todo->name}}</a>
                                        @if(!$todo->completed)
                                        <a href="/todos/{{ $todo->id }}/complete" style="color: white;" class="btn btn-warning btn-sm float-right">Complete</a>
                                        <a href="/todos/{{$todo->id}}/delete" class="btn btn-danger btn-sm float-right mr-2">Delete</a>
                                        <a href="/todos/{{$todo->id}}" class="btn btn-primary btn-sm float-right mr-2">View</a>
                                        @else
                                        <a href="/todos/{{$todo->id}}/delete" class="btn btn-danger btn-sm float-right mr-2">Delete</a>
                                        <a href="/todos/{{$todo->id}}" class="btn btn-primary btn-sm float-right mr-2">View</a>
                                        @endif    
                                    </li>
                                @endforeach                                
                        </ul>
                    </div>
                </div><!--tạo form thẻ-->
            </div> <!--chia trang-->
        </div><!--căn giữa nội dung các dòng-->
    </div>
@endsection