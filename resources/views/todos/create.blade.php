@extends('layouts.app')

@section('title')
Todo: Create 
@endsection

@section('content')
    <h1 class="text-center my-5">Create Todo</h1>

    <div class="row justify-content-center">
        <div class="col-md 8">
            <div class="card card-default">
                <div class="card-header">Create new Todo</div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach($errors->all() as $err)
                                    <li class="list-group-items">{{$err}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('loi'))
                        <div class="alert alert-danger">
                            {{session('loi')}}
                        </div>
                    @endif
                    <form action="/store-todos" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="todo">Tên việc cần làm</label>
                            <input type="text" placeholder="Name" name="name" class="form-control" autofocus>
                        </div>
                        
                        <div class="form-group">
                            <label for="todo">Việc cần làm</label>
                            <textarea  placeholder="Description" name="description" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <span>Ảnh đính kèm</span>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sau khi tạo form thì đăng ký url để xử lý dữ liệu form -->
@endsection
