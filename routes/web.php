<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuthCustomer;
use App\Http\Middleware\CheckAuthSatff;
//Khách hàng
use App\Http\Controllers\Khachhang\AuthCustomerController;
use App\Http\Controllers\Khachhang\DatLichHenController;
use App\Http\Controllers\NhanVien\AuthStaffController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\TestTypeController;

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

//Nhân viên 
Route::get('/nhan-vien-dang-nhap',[AuthStaffController::class,'login'])->name('staff.login');
Route::post('/nhan-vien-dang-nhap',[AuthStaffController::class,'handleLogin'])->name('staff.submit.login');


//Đặt lịch hẹn
Route::post('/dat-lich-hen',[DatLichHenController::class,'store'])->name('customer.datlichhen');


//Xem lịch hẹn
Route::get('/xem-lich-hen',[DatLichHenController::class,'reView'])->name('customer.xemlichhen');
Route::view('user', 'aesthetic.layout');
// Route::view('admin', 'admin.layout');
Route::get('/dang-xuat',[AuthCustomerController::class,'logout'])->name('customer.logout');



//Trang quản trị khi đã login
Route::middleware(['CheckAuthSatff'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/lich-hen',[DatLichHenController::class,'getAllAppointment'])->name('admin.lichhen');
        Route::post('/cap-nhat-lich-hen',[DatLichHenController::class,'updateAllAppointment'])->name('admin.capnhatlichhen');
        Route::get('/dang-xuat',[AuthStaffController::class,'logout'])->name('staff.logout');
    });
   
});






// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::view('/admin', 'admin/template.layout');
/*
 * Thuocs Routes
 */
Route::prefix('/thuoc')->name('thuoc.')->group(function () {
    Route::get('/',[MedicineController::class,'index'])->name('index');
    Route::get('/them',[MedicineController::class,'create'])->name('create');
    Route::post('/luu',[MedicineController::class,'store'])->name('store');
    Route::get('/{thuoc}/sua',[MedicineController::class,'edit'])->name('edit');
    Route::post('/{thuoc}/cap-nhat',[MedicineController::class,'update'])->name('update');
    Route::post('/{thuoc}/xoa',[MedicineController::class,'destroy'])->name('destroy');
});
Route::prefix('/loai-dich-vu')->name('loaidichvu.')->group(function () {
    Route::get('/',[ServiceTypeController::class,'index'])->name('index');
    Route::get('/them',[ServiceTypeController::class,'create'])->name('create');
    Route::post('/luu',[ServiceTypeController::class,'store'])->name('store');
    Route::get('/{loaidv}/sua',[ServiceTypeController::class,'edit'])->name('edit');
    Route::post('/{loaidv}/cap-nhat',[ServiceTypeController::class,'update'])->name('update');
    Route::post('/{loaidv}/xoa',[ServiceTypeController::class,'destroy'])->name('destroy');
});
Route::prefix('/dich-vu')->name('dichvu.')->group(function () {
    Route::get('/',[ServiceController::class,'index'])->name('index');
    Route::get('/them',[ServiceController::class,'create'])->name('create');
    Route::post('/luu',[ServiceController::class,'store'])->name('store');
    Route::get('/{dichvu}/sua',[ServiceController::class,'edit'])->name('edit');
    Route::post('/{dichvu}/cap-nhat',[ServiceController::class,'update'])->name('update');
    Route::post('/{dichvu}/xoa',[ServiceController::class,'destroy'])->name('destroy');
});
Route::prefix('/xet-nghiem')->name('xetnghiem.')->group(function () {
    Route::get('/',[TestController::class,'index'])->name('index');
    Route::get('/them',[TestController::class,'create'])->name('create');
    Route::post('/luu',[TestController::class,'store'])->name('store');
    Route::get('/{canlamsan}/sua',[TestController::class,'edit'])->name('edit');
    Route::post('/{canlamsan}/cap-nhat',[TestController::class,'update'])->name('update');
    Route::post('/{canlamsan}/xoa',[TestController::class,'destroy'])->name('destroy');
});
Route::prefix('/loai-xet-nghiem')->name('loaixetnghiem.')->group(function () {
    Route::get('/',[TestTypeController::class,'index'])->name('index');
    Route::get('/them',[TestTypeController::class,'create'])->name('create');
    Route::post('/luu',[TestTypeController::class,'store'])->name('store');
    Route::get('/{loaicl}/sua',[TestTypeController::class,'edit'])->name('edit');
    Route::post('/{loaicl}/cap-nhat',[TestTypeController::class,'update'])->name('update');
    Route::post('/{loaicl}/xoa',[TestTypeController::class,'destroy'])->name('destroy');
});
