<?php

namespace App\Http\Controllers\Khachhang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
class DatLichHenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hoten = $request->hoten;
        $ngayhen = $request->ngayhen;
        $sdt = $request->sdt;
        $noidung = $request->noidung;

        /*
            * Lấy thông tin khách hàng đặt lịch hẹn lưu vào hồ sơ bệnh và tạo tài khoản cho khách hàng.
            * Check khách hàng đã tồn tại hay chưa ? 
        */
        $khachhang = [
            'hsb_hoten' => $hoten,
            'username'=>$sdt,
            'password'=>bcrypt('12345')
        ];

        $result = DB::table('khachhang')->insert($khachhang);
        if($result)
        {
            Session::flash('message', 'Đặt lịch thành công!');
        }

        return redirect()->route('customer.home');

       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
