<?php

namespace App\Http\Controllers\Khachhang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use Alert;
use DB;
use Session;
use Auth;
use Mail;
use App\Models\KhachHang;
use App\Models\Phieuhen;

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
        $ip = $request->ip();
        $ngaydangky = date('Y-m-d H:i:s');
      
      $checkPhieuHen=Phieuhen::where('ph_ip',$ip)->where('ph_ngaydangky','>=',date("Y-m-d H:i:s", strtotime('-1 hours')))->first(); 
        if($checkPhieuHen){
            alert()->error('Đặt lịch hẹn thất bại',' Bạn đã đăng ký trước đó, nếu muốn đăng ký tiếp vui lòng chờ sau 60 phút');

            return back();
        }
        $lichHen=[
            'ph_hoten'=>$hoten,
            'ph_sdt'=>$sdt,
            'ph_ngayhen'=>date('Y-m-d', strtotime($ngayhen)),
            'ph_giohen'=>date("H:i", strtotime($ngayhen)),
            'ph_yeucau'=>$noidung,
            'ph_trangthai'=>0, //Chưa có được duyệt bởi admin
            'ph_email'=>$email,
            'ph_ngaydangky'=>$ngaydangky,
            'ph_ip'=>$ip
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

        $lichHen = DB::table('phieuhen')->where('ph_ma',$id)->first();
        $lichHen->makhambenh='PND'.rand(1000,99999);
        $lichHen=(array)$lichHen;
        //Cập nhật trạng thái thành công và gửi mã phiếu hẹn đến khách hàng qua mail
        if($tt == 1)
        {
            Mail::send('admin.lichhen.send-mail',$lichHen,function($message) use($lichHen){
                $message->from('pndsolutions2021@mail.com','BỆNH VIỆN xx');
                $message->to($lichHen['ph_email'],$lichHen['ph_email']);
                $message->subject('PHIẾU HẸN KHÁM BỆNH');
            });
        }
        return redirect()->back();
    }
  
}
