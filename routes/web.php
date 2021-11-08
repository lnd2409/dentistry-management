<?php

use App\Http\Controllers\Admin\ExpertiseController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuthCustomer;
use App\Http\Middleware\CheckAuthSatff;
//Khách hàng
use App\Http\Controllers\Khachhang\AuthCustomerController;
use App\Http\Controllers\Khachhang\DatLichHenController;
use App\Http\Controllers\NhanVien\AuthStaffController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\TestTypeController;
use App\Http\Controllers\Admin\MedicalRecordsController;


use App\Http\Controllers\TestSendMailController;

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
Route::get('/', [AuthCustomerController::class, 'index'])->name('customer.home');

//Nhân viên
Route::get('/admin', [AuthStaffController::class, 'login'])->name('staff.login');
Route::post('/nhan-vien-dang-nhap', [AuthStaffController::class, 'handleLogin'])->name('staff.submit.login');


//Đặt lịch hẹn
Route::post('/dat-lich-hen', [DatLichHenController::class, 'store'])->name('customer.datlichhen');


//main flow


//Xem lịch hẹn
Route::get('/xem-lich-hen', [DatLichHenController::class, 'reView'])->name('customer.xemlichhen');
Route::view('user', 'aesthetic.layout');
// Route::view('admin', 'admin.layout');
Route::get('/dang-xuat', [AuthCustomerController::class, 'logout'])->name('customer.logout');



//Trang quản trị khi đã login
Route::middleware(['CheckAuthSatff'])->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/lich-hen', [DatLichHenController::class, 'getAllAppointment'])->name('admin.lichhen');
        Route::get('/lich-hen-them', [DatLichHenController::class, 'addAppoitment'])->name('admin.themlichhen');
        Route::post('/cap-nhat-lich-hen', [DatLichHenController::class, 'updateAllAppointment'])->name('admin.capnhatlichhen');
        Route::post('/tim-kiem-lich-hen', [DatLichHenController::class,'searchAllAppointment'])->name('admin.timkiemtlichhen');
        Route::get('/dang-xuat', [AuthStaffController::class, 'logout'])->name('staff.logout');

        /*
        * Thuocs Routes
        */
       Route::group(['middleware' => 'CheckRole:3'], function () {//quản lý kho
        Route::prefix('/thuoc')->name('thuoc.')->group(function () {
            Route::get('/',[MedicineController::class,'index'])->name('index');
            Route::get('/them',[MedicineController::class,'create'])->name('create');
            Route::post('/luu',[MedicineController::class,'store'])->name('store');
            Route::get('/{thuoc}/sua',[MedicineController::class,'edit'])->name('edit');
            Route::post('/{thuoc}/cap-nhat',[MedicineController::class,'update'])->name('update');
            Route::post('/{thuoc}/xoa',[MedicineController::class,'destroy'])->name('destroy');
        });
       });


        Route::group(['middleware' => 'CheckRole:5'], function () { //admin
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

            Route::prefix('quan-tri')->name('staffs.')->group(function () {
                Route::get('/', [StaffController::class,'index'])->name('index');
                Route::get('/them', [StaffController::class,'create'])->name('create');
                Route::post('/luu', [StaffController::class,'store'])->name('store');
                Route::get('/sua/{nhanvien}', [StaffController::class,'edit'])->name('edit');
                Route::post('/cap-nhat/{nhanvien}', [StaffController::class,'update'])->name('update');
                Route::post('/xoa/{nhanvien}', [StaffController::class,'destroy'])->name('destroy');
            });
            Route::prefix('chuyen-mon')->name('expertises.')->group(function () {
                Route::get('/', [ExpertiseController::class,'index'])->name('index');
                Route::get('/them', [ExpertiseController::class,'create'])->name('create');
                Route::post('/luu', [ExpertiseController::class,'store'])->name('store');
                Route::get('/sua/{chuyenmon}', [ExpertiseController::class,'edit'])->name('edit');
                Route::post('/cap-nhat/{chuyenmon}', [ExpertiseController::class,'update'])->name('update');
                Route::post('/xoa/{chuyenmon}', [ExpertiseController::class,'destroy'])->name('destroy');
            });
            Route::prefix('lich-truc')->name('schedules.')->group(function () {
                Route::get('/', [ScheduleController::class, 'index'])->name('index');
                Route::post('/luu', [ScheduleController::class, 'store'])->name('store');
                Route::post('/xoa', [ScheduleController::class, 'destroy'])->name('destroy');
            });
        });
    });

    // Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::view('/admin', 'admin/template.layout');

    Route::prefix('/ho-so-benh')->name('medical.record.')->group(function () {
        Route::get('/', [MedicalRecordsController::class, 'index'])->name('index');
        Route::get('/them-moi', [MedicalRecordsController::class, 'create'])->name('add');
        Route::post('/xu-ly-them-moi',[MedicalRecordsController::class, 'store'])->name('store');
    });
});

Route::get('getSchedule', [ScheduleController::class, 'getSchedule'])->name('getSchedule');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/mail',[TestSendMailController::class,'index'])->name('sendmail');