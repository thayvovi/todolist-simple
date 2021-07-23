<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TodosControllerB1@home');

///////////////////////////////////////////
//Có 4 cách trỏ vào about ở laravel 8//
//Cách 1://
//Route::get('about', function () {
//     return view('client.about');
//});
//Cách 2: Sử dụng đường dẫn đến controller kèm cả namespace => Route::get('about', 'App\Http\Controllers\AboutController@index');
//Cách 3: Thêm namespace mặc định => vào providers/RouteServiceProvider thêm protected $namespace = 'App\Http\Controllers';
//Cách 4: Sử dụng cú pháp action(nên dùng cách này ở laravel 8) => Route::get('about', [AboutController::class, 'index']);
// Route::get('about', [AboutController::class, 'index']);
// Route::get('todos', 'TodosControllerB1@index');
// Route::get('todos/{slug}', 'TodosControllerB1@show'); //tạo URL động(Dynamic route) là {id}
// Route::get('news-todo', 'TodosControllerB1@create');
// Route::post('/store-todos', 'TodosControllerB1@store');
// Route::get('/todos/{todo}/edit', 'TodosControllerB1@edit');
// Route::post('/todos/{todo}/update-todo', 'TodosControllerB1@update');
// Route::get('/todos/{todo}/delete', 'TodosControllerB1@destroy');
// Route::get('/todos/{todo}/complete', 'TodosControllerB1@complete');

//Đăng nhập
Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('login', [UserController::class, 'postLogIn']);

//Đăng ký
Route::get('registers', [UserController::class, 'create'])->name('register');
Route::post('registers-todo', [UserController::class, 'store']);

//Đăng xuất
Route::get('logout', [UserController::class, 'getLogout']);

//User
Route::group(['prefix' => 'user/{id}'], function () {
    Route::get('/edit', [UserController::class, 'edit'])->name('edit-user')->middleware('auth');
    Route::post('/update-user', [UserController::class, 'updateInfo']);

    Route::get('/change-password', [UserController::class, 'getChangePass'])->name('change-pass')->middleware('auth');
    Route::post('/update-password', [UserController::class, 'postChangePass']);
});

//Todos
Route::get('todos', 'TodosControllerB1@index')->middleware('auth'); //danh sách todo
Route::get('news-todo', 'TodosControllerB1@create')->middleware('auth'); //tạo todo
Route::get('todos/{slug}', 'TodosControllerB1@show'); //tạo URL động(Dynamic route) là {slug} để hiển thị chi tiết
Route::post('/store-todos', 'TodosControllerB1@store'); //lấy dữ liệu form để tạo
Route::group(['prefix' => 'todos/{todo}'], function () {
    //trang chỉnh sửa
    Route::get('/edit', 'TodosControllerB1@edit'); //trả về trang chi tiết
    Route::post('/update-todo', 'TodosControllerB1@update'); //lấy dữ liệu form để cập nhật

    //trang chức năng
    Route::get('/delete', 'TodosControllerB1@destroy'); //xóa dữ liệu khi click tương tự như form
    Route::get('/complete', 'TodosControllerB1@complete'); //hiển thị hoàn thành sau khi click
});
