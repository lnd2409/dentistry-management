<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuthCustomer;
//Khách hàng
use App\Http\Controllers\Khachhang\AuthCustomerController;
use App\Http\Controllers\Khachhang\DatLichHenController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Trang khách hàng
Route::get('/',[AuthCustomerController::class,'index'])->name('customer.home');
Route::get('/dang-nhap',[AuthCustomerController::class,'login'])->name('customer.login');

Route::post('/xu-dang-nhap',[AuthCustomerController::class,'handleLogin'])->name('customer.checklogin');

//Đặt lịch hẹn
Route::post('/dat-lich-hen',[DatLichHenController::class,'store'])->name('customer.datlichhen');

//Khách hàng đã đăng nhập
Route::middleware(['CheckAuthCustomer'])->group(function () {
    Route::view('user', 'aesthetic.layout');
    Route::view('admin', 'admin.layout');
    Route::get('/dang-xuat',[AuthCustomerController::class,'logout'])->name('customer.logout');
});







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
