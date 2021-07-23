@extends('layouts.app')

@section('title')
    Edit: {{$todo->name}}
@endsection
@section('content')
    <h1 class="text-center my-5">EDIT PAGE</div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    Edit: {{$todo->name}}</div>
                <div class="card-body">
                    @if($errors->any())
                        <ul class="list-group">
                            @foreach($errors->all() as $err)
                                <li class="list-group-item">
                                    <i class="alert alert-danger">{{$err}}</i>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="/todos/{{$todo->id}}/update-todo" method="post" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group">
                           <span>Tên công việc</span>
                           <input type="text" name="name" class="form-control" value="{{$todo->name}}">  
                       </div>
                       <div class="form-group">
                           <span>Mô tả công việc</span>
                           <textarea name="description" placeholder="Description" rows="5" class="form-control">{{$todo->description}}</textarea>
                       </div>
                       <div class="form-group">
                            <span>Ảnh đính kèm</span>
                            <img src="/images/{{$todo->images}}" width="100px" height="100px" class="img-fluid"alt="{{$todo->name}}">
                        </div>
                        <div class="form-group">
                            <span>Thay ảnh đính kèm</span>
                            <input type="file" name="image">
                            <!-- tý fix nốt -->
                        </div>
                       <div class="form-group text-center">
                           <button type="submit" class="btn btn-success">Cập nhật</button>
                            <a href="/todos/{{$todo->id}}" class="btn btn-primary mr-2">Cancel<span class="sr-only">(current)</span></a>

                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
