<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Auth;
class ReceiptController extends Controller
{

    public function index() {
        $data = DB::table('phieuthu')->orderBy('pt_ngaylap','desc')->get();
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
            ''
        ]);

        return redirect()->route('receipt.index');
    }
}
