<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\NhanVien;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class AuthStaffController extends Controller
{
   public function login()
   {
     return view('admin.login.index');
   }

    public function logout()
    {
        Auth::guard('nhanvien')->logout();
        return view('admin.login.index');
    }





     public function handleLogin(Request $request)
    {
        $arrUser = [
            'username' => $request->username,
            'password' =>$request->password
        ];
        // dd($arrUser);
        if (Auth::guard('nhanvien')->attempt($arrUser)) {

            return view('admin.template.layout');
            }
        else {
            dd("Đăng nhập thất bại!");
        }
    }


}
