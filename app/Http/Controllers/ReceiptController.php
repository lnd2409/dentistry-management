<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Auth;
use PDF;
use App\Models\HoSoBenh;
use App\Models\PhieuKham;
use App\Models\DichVu;
use App\Models\Thuoc;
use App\Models\Loaicanlamsan;
use App\Models\Canlamsan;
class ReceiptController extends Controller
{

    public function index() {
        $data = DB::table('phieuthu')->orderBy('pt_ngaylap','desc')->join('phieukham','phieukham.pk_ma','phieuthu.pk_ma')
                ->join('hosobenh','hosobenh.hsb_ma','phieukham.hsb_ma')
                ->get();
        return view('admin.receipt.index', compact('data'));
    }

    public function createReceipt($idMedicalRecord, Request $request) {
        $insert = DB::table('phieuthu')->insert(
            [
                'pt_ngaylap' => Carbon::now(),
                'pt_tongtien' => $request->get('tongTien'),
                'nv_ma' => Auth::guard('nhanvien')->id(),
                'pk_ma' => $idMedicalRecord
            ]
        );

        $changeStatus = DB::table('phieukham')->where('pk_ma', $idMedicalRecord)->update([
            'pk_trangthai' => 0
        ]);

        return redirect()->route('receipt.index');
    }

    public function changeStatus($id) {
        $changeStatus = DB::table('phieuthu')->where('pt_ma', $id)->update([
            'pt_trangthai' => 1
        ]);
        return redirect()->back();
    }

    public function createPDF($idMedicalRecord) {
        $detail = PhieuKham::find($idMedicalRecord);
        $info = HoSoBenh::find($detail->hsb_ma);

        //Thuốc
        $medical = DB::table('chitietthuoc')->join('thuoc','thuoc.thuoc_ma','chitietthuoc.thuoc_ma')->where('chitietthuoc.pk_ma',$idMedicalRecord)->get();
        $medicalSelect = DB::table('chitietthuoc')->join('thuoc','thuoc.thuoc_ma','chitietthuoc.thuoc_ma')
        ->where('chitietthuoc.pk_ma',$idMedicalRecord)->select('chitietthuoc.thuoc_ma')->get();
        $medicalAll = Thuoc::whereNotIn('thuoc_ma', $medicalSelect->pluck('thuoc_ma'))->get();

        //Dịch vụ
        $serviceType = DB::table('loaidichvu')->get();

        //Cận lâm sàn
        $testType = Loaicanlamsan::all();

        //Lịch sử khám
        $history = PhieuKham::join('nhanvien','nhanvien.nv_ma','phieukham.nv_ma')->orderBy('phieukham.created_at','DESC')->get();

        //Phiếu xét nghiệm
        $appointmentTest = DB::table('phieuxetnghiem')->join('canlamsan','canlamsan.cls_ma','phieuxetnghiem.cls_ma')->where('phieuxetnghiem.pk_ma',$idMedicalRecord)->get();

         //Dịch vụ chi tiết
         $service = DB::table('chitietphieukhamdichvu')->join('dichvu','dichvu.dv_ma','chitietphieukhamdichvu.dv_ma')
         ->where('chitietphieukhamdichvu.pk_ma', $idMedicalRecord)->get();

        //  dd($service);
        $data = [
            'info' => $info,
            'medical' => $medical,
            'appointmentTest' => $appointmentTest,
            'service' => $service,
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('admin.receipt.pdf', $data);

        return $pdf->download('tutsmake.pdf');
    }
}
