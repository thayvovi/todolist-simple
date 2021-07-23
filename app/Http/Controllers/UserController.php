<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function postLogIn()
    {
        $this->validate(request(),
            [
                'user' => 'required|min:6|max:10',
                'pass' => 'required|min:6|max:32',
            ],
            [
                'user.required' => 'Vui lòng nhập tài khoản',
                'pass.required' => 'Vui lòng nhập mật khẩu',
                'user.min' => 'Tài khoản phải có độ dài 6 ký tự trở lên',
                'pass.min' => 'Mật khẩu có độ dài từ 6 ký tự',
                'pass.max' => 'Mật khẩu có độ dài dưới 32 ký tự',
            ]
        );
        $data = request()->all();
        $arr =
        [
            'user' => $data['user'],
            'password' => $data['pass'],
        ];
        if (Auth::attempt($arr)) {
            return redirect('/');
        } else {
            return redirect('/login')->with('thong bao', 'Tài khoản hoặc mật khẩu không thành công');
        }
    }

    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(),
            [
                'name' => 'required|string|max:50',
                'user' => 'required|unique:users|min:6|max:15',
                'pass' => 'required|min:6|max:32',
                're-pass' => 'required|same:pass',
                'email' => 'required|email',
            ],
            [
                'name.required' => 'Vui lòng nhập họ tên',
                'user.required' => 'Vui lòng nhập tài khoản',
                'pass.required' => 'Vui lòng nhập mật khẩu',
                're-pass.required' => 'Vui lòng xác nhận lại mật khẩu',
                'email.required' => 'Vui lòng nhập email',
                'name.max' => 'Họ tên không vượt quá 50 ký tự',
                'user.min' => 'Tài khoản phải có độ dài 6 ký tự trở lên',
                'user.max' => 'Tài khoản có độ dài dưới 15 ký tự',
                'pass.min' => 'Mật khẩu có độ dài từ 6 ký tự',
                'pass.max' => 'Mật khẩu có độ dài dưới 32 ký tự',
                're-pass.same' => 'Xác nhận mật khẩu không trùng khớp',
                'email' => 'Email không đúng định dạng',
            ],
        );
        $data = request()->all();
        $user = new User();
        $user->name = $data['name'];
        $user->user = $data['user'];
        $user->password = bcrypt($data['pass']);
        $user->email = $data['email'];
        $user->save();

        return redirect('/login');
    }

    public function edit($id)
    {
        return view('users.edit')->with('id', User::find($id));
    }

    public function updateInfo($id)
    {
        $this->validate(request(),
            [
                'name' => 'required|string|max:50',
                'email' => 'required|email',
            ],
            [
                'name.required' => 'Vui lòng nhập họ tên',
                'email.required' => 'Vui lòng nhập email',
                'name.max' => 'Họ tên không vượt quá 50 ký tự',
                'email' => 'Email không đúng định dạng',
            ],
        );
        $data = request()->all();
        $user = User::find($id);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        return redirect('user/'.Auth::user()->id.'/edit');
    }

    public function getChangePass($id)
    {
        return view('users.change')->with('id', User::find($id));
    }

    public function postChangePass($id)
    {
        $this->validate(request(),
            [
                'passold' => 'required|min:6|max:32',
                'passnew' => 'required|min:6|max:32',
                're-passnew' => 'required|same:passnew',
            ],
            [
                'passold.required' => 'Vui lòng nhập mật khẩu cũ',
                'passnew.required' => 'Mật khẩu mới phải khác mật khẩu cũ',
                're-passnew.required' => 'Mật khẩu mới trùng với mật khẩu nhập lại',
                'passold.min' => 'Mật khẩu có độ dài từ 6 ký tự',
                'passold.max' => 'Mật khẩu có độ dài dưới 32 ký tự',
                'passnew.min' => 'Mật khẩu có độ dài từ 6 ký tự',
                'passnew.max' => 'Mật khẩu có độ dài dưới 32 ký tự',
                're-passnew.same' => 'Xác nhận mật khẩu không trùng khớp',
            ]
        );

        $data = request()->all();
        $user = User::find($id);
        if ($user->password != $data['passold']) {
            $user->password = bcrypt($data['passnew']);
            $user->save();

            return redirect('user/'.$id.'/change-password')->with('tb-success', 'Thay đổi mật khẩu thành công!');
        } else {
            return redirect('user/'.$id.'/change-password')->with('tb-danger', 'Mật khẩu cũ không chính xác');
        }
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
