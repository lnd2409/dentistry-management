<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HoSoBenh;
use Carbon\Carbon;
class MedicalRecordsController extends Controller
{
    public function index(Request $request) {
        $hoSoBenh = HoSoBenh::orderBy('hsb_ma', 'desc');
        if ($request->has('hoTen') && $request->hoTen != null) {
            # code...
            $hoSoBenh->where('hsb_hotenkhachhang','like','%'.$request->hoTen.'%');
        }
        if ($request->has('maSo') && $request->maSo != null) {
            # code...
            $hoSoBenh->where('hsb_maso',$request->maSo);
        }
        if ($request->has('soDienThoai') && $request->soDienThoai != null) {
            # code...
            $hoSoBenh->where('hsb_sdt',$request->soDienThoai);
        }
        if ($request->has('namSinh') && $request->namSinh != null) {
            # code...
            $hoSoBenh->where('hsb_namsinh',$request->namSinh);
        }
        $hoSoBenh = $hoSoBenh->get();
        return view('admin.medical_records.index', compact('hoSoBenh'));
    }

    public function create() {
        $randCode = rand(10000, 99999);
        $count = HoSoBenh::where('hsb_maso', $randCode)->count();
        if ($count > 0) {
            $randCode = rand(10000, 99999);
        }
        return view('admin.medical_records.create', compact('randCode'));
    }

    public function store(Request $request) {
        $request->merge([
            'hsb_ngaylap' => Carbon::now()
        ]);
        $thuoc=HoSoBenh::create($request->all());
        return redirect()->route('medical.record.index');
    }
}
