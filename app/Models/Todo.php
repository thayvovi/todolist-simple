<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $table = 'todos'; //sau khi thêm dữ liệu thì khởi tạo giá trị bảng
    //sau đó quay lại controller để lấy all() dữ liệu
    //rồi return về trang todo + with dữ liệu vừa lấy vd return view('index')->with('todos',$todos);
}
