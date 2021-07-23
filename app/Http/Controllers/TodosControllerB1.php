<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TodosControllerB1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $todos = Todo::orderBy('created_at', 'desc')->paginate(5);

        return view('welcome', ['todos' => $todos]);
    }

    public function index()
    {
        /////////////////////////////////////////////////////////////////////
        //trình tự các bước Model -> Controller -> View theo quy trình MVC///
        /////////////////////////////////////////////////////////////////////

        //tạo url dẫn đến trang index.blade.php
        //Tạo model với artisan make:model
        //Sau đó tạo table todos trên database bằng php artisan migration
        //sau khi thực hiện lệnh artisan thì thêm cột name,description,completed trong bảng vừa tạo
        //Sau đó nhập dữ liệu mẫu với factory và seeding
        //Sau đó qua model thực thi
        // $todos = Todo::all(); //lấy toàn bộ dữ liệu todos trong bảng csdl
        $todos = Todo::orderBy('created_at', 'desc')->paginate(10);

        return view('todos.index', ['todos' => $todos]); //trả về dữ liệu
        //sau đó vào trang index để in dữ liệu
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        //Trước khi lấy dữ liệu sẽ kiểm tra xem nó có bị trùng name không

        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required',
        ]);
        //xử lý dữ liệu form
        $data = request()->all(); //lấy toàn bộ dữ liệu đã nhập

        $todo = new Todo(); //khởi tạo giá trị bảng todos

        $todo->name = $data['name'];
        $todo->description = $data['description'];

        if (request()->hasFile('image')) {
            //chi tiết
            $file = request()->file('image'); //lưu hình vào biến file
            $duoi = $file->getClientOriginalExtension(); //lấy đuôi định dạng
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'gif' && $duoi != 'jpeg') {
                return redirect('news-todo')->with('loi', 'File của bạn phải có định dạng jpg,png,gif,jpge');
            }
            $name = $file->getClientOriginalName(); //lấy tên hình
            $Hinh = str::random(4).'_'.$name;
            //echo $Hinh;//test thử xem đặt tên thế nào trước đó phải bỏ $bien->save() để không lưu
            while (file_exists('images/'.$Hinh)) {//kiểm tra tồn tại chưa nếu trùng thì lặp cho đến khi không bị trùng
                $Hinh = str::random(4).'_'.$name; //với hinh bảng tên người dùng đặt và trước tên gốc là ký tự random
            }

            $file->move('images', $Hinh); //lưu hình

            $todo->images = $Hinh;

        //đơn giản
            //$todo->images = request()->file('image')->move('images', '1.png'); //move dùng để lưu với move(path,tên_ảnh cần lưu)
        } else {
            $todo->images = '';
        }
        $todo->completed = false;
        $todo->save();

        session()->flash('success', 'Thêm thành công');

        return redirect('/todos');
        //Sau khi thêm sẽ tạo update
    }

    public function show($slug)
    {
        //tìm kiếm id đã chọn để hiển thị nội dung
        return view('todos.show')->with('todo', Todo::find($slug));

        //Sau khi hiển thị thì tạo trang chỉnh sửa ở mục edit
    }

    public function edit($id)
    {
        //trả về trang chỉnh sửa bằng phương thức get

        return view('todos.edit')->with('todo', Todo::find($id));
    }

    public function update($id)
    {
        //sau khi người dùng nhập và ấn cập nhật thì chuyển sang trang update bằng pt post
        $this->validate(request(), [
            'name' => 'required|min:1',
            'description' => 'required',
        ]);
        $data = request()->all();
        $todo = Todo::find($id);
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'gif' && $duoi != 'jpeg') {
                return redirect('admin/tintuc/sua/'.$id)->with('loi', 'File của bạn phải có định dạng jpg,png,gif,jpge');
            }
            $name = $file->getClientOriginalName();
            $Hinh = str::random(4).'_'.$name;

            while (file_exists('images/'.$Hinh)) {
                $Hinh = str::random(4).'_'.$name;
            }

            $file->move('images', $Hinh);
            unlink('images/'.$todo->images);
            $todo->images = $Hinh;
        } else {
        }
        $todo->completed = false;

        $todo->save();
        session()->flash('success', 'Chỉnh sửa thành công');
        //Lưu trữ dữ liệu nhan
        return redirect('todos/'.$id);
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);

        $todo->delete();
        request()->session()->flash('success', 'Xóa thành công');

        return redirect('/todos');
    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;
        $todo->save();

        session()->flash('success', 'Công việc đã hoàn thành');

        return redirect('/todos');
    }
}
