<?php

namespace App\Http\Controllers\Khachhang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Alert;
use DB;
use Session;
use Auth;
use App\Models\KhachHang;
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
       if(Auth::guard('khachhang')->check())
       {
             $lichHen=[
             'ph_ngayhen'=>date('Y-m-d', strtotime($ngayhen)),
             'ph_giohen'=>date("H:i", strtotime($ngayhen)),
             'ph_yeucau'=>$noidung,
             'ph_trangthai'=>0, //Chưa có được duyệt bởi admin
             'hsb_ma'=>Auth::guard('khachhang')->user()->hsb_ma
             ];
                $result = DB::table('phieuhen')->insert($lichHen);
            if($result)
            {
                alert()->success('Đặt lịch hẹn', 'Thành công');
            }
       }
       else
       {
            /*
            * Lấy thông tin khách hàng đặt lịch hẹn lưu vào hồ sơ bệnh và tạo tài khoản cho khách hàng.
            * Check khách hàng đã tồn tại hay chưa ?
            */
            $khachhang = [
                'hsb_hoten' => $hoten,
                'username'=>$sdt,
                'hsb_sdt'=>$sdt,
                'password'=>bcrypt('123')
            ];
            // Create thông tin bệnh nhân
            $idCustommer = DB::table('khachhang')->insertGetId($khachhang);
            //Lấy thông tin cho lịch hẹn
            $lichHen=[
                'ph_ngayhen'=>date('Y-m-d', strtotime($ngayhen)),
                'ph_giohen'=>date("H:i", strtotime($ngayhen)),
                'ph_yeucau'=>$noidung,
                'ph_trangthai'=>0, //Chưa có được duyệt bởi admin
                'hsb_ma'=>$idCustommer
            ];
            $result = DB::table('phieuhen')->insert($lichHen);
            if($result)
            {
                alert()->success('Đặt lịch hẹn', 'Thành công');
            }
       }
        return redirect()->route('customer.home');
    }

    public function checkCustomer(Request $request)
    {
         if($request->ajax()){
            $temp=0;
            $result = KhachHang::where('hsb_sdt',$request->sdt)->get();
            return response()->json(['data'=>$result],200);
         } 
    }


    public function reView()
    {
        $lichHen = DB::table('phieuhen')->where('hsb_ma', Auth::guard('khachhang')->id())->get();
        // dd($lichHen);
        return view('client.lichhen.index',compact('lichHen'));
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
