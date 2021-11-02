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
        $email = $request->email;
        $ngayhen = $request->ngayhen;
        $sdt = $request->sdt;
        $noidung = $request->noidung;
      
       
        
        $lichHen=[
            'ph_hoten'=>$hoten,
            'ph_sdt'=>$sdt,
            'ph_ngayhen'=>date('Y-m-d', strtotime($ngayhen)),
            'ph_giohen'=>date("H:i", strtotime($ngayhen)),
            'ph_yeucau'=>$noidung,
            'ph_trangthai'=>0, //Chưa có được duyệt bởi admin
            'ph_email'=>$email
        ];
        
        $result = DB::table('phieuhen')->insert($lichHen);
        if($result)
        {
            alert()->success('Đặt lịch hẹn', 'Thành công');
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
   
    public function getAllAppointment()
    {
        $lichhen = DB::table('phieuhen')->get();
        return view('admin.lichhen.index',compact('lichhen'));
    }
    public function updateAllAppointment(Request $request)
    {
        // Hủy 3
        // Đã đến khám 2
        // Đã xác nhận 1
        // Đang xử lý 0
        $tt = $request->trangthai;
        $id = $request->ph_ma;
        $nvMa = Auth::guard('nhanvien')->id();
        DB::table('phieuhen')->where('ph_ma',$id)->update([
            'ph_trangthai'=>$tt,
            'nv_ma'=>$nvMa
        ]);
        return redirect()->back();
    }
  
}
