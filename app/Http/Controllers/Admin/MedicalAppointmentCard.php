<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoSoBenh;
use App\Models\PhieuKham;
use App\Models\DichVu;
use App\Models\Thuoc;
use Carbon\Carbon;
use Auth;
use DB;
class MedicalAppointmentCard extends Controller
{

    public function index(Request $request) {
        $data = PhieuKham::join('hosobenh','hosobenh.hsb_ma','phieukham.hsb_ma')->get();
        // dd($data);
        return view('admin.medical_appointment.index', compact('data'));
    }

    public function create($idRecord) {
        $info = HoSoBenh::find($idRecord);
        $createAppointmentCard = PhieuKham::create(
            [
                'pk_ngaykham' => Carbon::now(),
                'pk_trangthai' => 1,
                'nv_ma' => Auth::guard('nhanvien')->id(),
                'hsb_ma' => $info->hsb_ma
            ]
        );
        $appointmentCardDetail = PhieuKham::find($createAppointmentCard->pk_ma);
        return view('admin.medical_appointment.create', compact('info','appointmentCardDetail'));
    }

    public function detail($id) {
        $detail = PhieuKham::find($id);
        $info = HoSoBenh::find($detail->hsb_ma);

        //Thuốc
        $medical = DB::table('chitietthuoc')->join('thuoc','thuoc.thuoc_ma','chitietthuoc.thuoc_ma')->where('chitietthuoc.pk_ma',$id)->get();
        $medicalSelect = DB::table('chitietthuoc')->join('thuoc','thuoc.thuoc_ma','chitietthuoc.thuoc_ma')
        ->where('chitietthuoc.pk_ma',$id)->select('chitietthuoc.thuoc_ma')->get();
        $medicalAll = Thuoc::whereNotIn('thuoc_ma', $medicalSelect->pluck('thuoc_ma'))->get();

        //Dịch vụ
        $serviceType = DB::table('loaidichvu')->get();

        return view('admin.medical_appointment.detail',
        compact('detail','info','medical','medicalAll','medicalSelect','serviceType'));
    }

    public function getMedicalAjax($idMedical) {
        $medical = Thuoc::find($idMedical);
        return response()->json($medical, 200);
    }

    public function addMedical(Request $request, $idPhieuKham) {
        // dd(Input::get('thuoc'));
        $thuoc = $request->get('thuoc');
        $cachDung = $request->get('cachDung');
        $soLuong = $request->get('soLuong');
        // dd($request->get('thuoc'));
        foreach ($thuoc as $key => $value) {
            # code...
            $checkNull = DB::table('chitietthuoc')->where('pk_ma', $idPhieuKham)->where('thuoc_ma', $value)->count();
            if($checkNull > 0) {
                $update = DB::table('chitietthuoc')->where('pk_ma', $idPhieuKham)->where('thuoc_ma', $value)->update(
                            [
                                'ctt_soluong' => $soLuong[$key],
                                'ctt_cachdung' => $cachDung[$key],
                            ]
                        );
            }else {
                $insert = DB::table('chitietthuoc')->insert(
                    [   'thuoc_ma' => $value,
                        'ctt_soluong' => $soLuong[$key],
                        'ctt_cachdung' => $cachDung[$key],
                        'pk_ma' => $idPhieuKham
                    ]
                );
            }
        }
        return redirect()->back();
    }

    public function getService($idTypeservice) {
        $service = DichVu::where('ldv_ma', $idTypeservice)->get();
        return response()->json($service, 200);
    }
}
