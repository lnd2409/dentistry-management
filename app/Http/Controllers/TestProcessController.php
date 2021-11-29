<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class TestProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('phieuxetnghiem')
            ->join('canlamsan','canlamsan.cls_ma','phieuxetnghiem.cls_ma')
            ->join('phieukham','phieukham.pk_ma','phieuxetnghiem.pk_ma')
            ->join('hosobenh','hosobenh.hsb_ma','phieukham.hsb_ma')
            ->get();
        // dd($data);
        return view('admin.test_process.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = DB::table('phieuxetnghiem')
                ->join('canlamsan','canlamsan.cls_ma','phieuxetnghiem.cls_ma')
                ->join('phieukham','phieukham.pk_ma','phieuxetnghiem.pk_ma')
                ->join('hosobenh','hosobenh.hsb_ma','phieukham.hsb_ma')
                ->where('phieuxetnghiem.pxn_ma', $id)
                ->first();

        return view('admin.test_process.detail', compact('detail'));
    }

    public function showAjax($id)
    {
        $detail = DB::table('phieuxetnghiem')
                ->join('canlamsan','canlamsan.cls_ma','phieuxetnghiem.cls_ma')
                ->join('phieukham','phieukham.pk_ma','phieuxetnghiem.pk_ma')
                ->join('hosobenh','hosobenh.hsb_ma','phieukham.hsb_ma')
                ->where('phieuxetnghiem.pxn_ma', $id)
                ->first();
        return response()->json($detail, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $update = DB::table('phieuxetnghiem')->where('phieuxetnghiem.pxn_ma', $id)
                ->update([
                    'pxn_ketqua' => $request->ketQua,
                    'pxn_ghichu' => $request->ghiChu,
                    'pxn_trangthai' => $request->trangThai,
                    'pxn_hinhanh' => $request->hinhAnh
                ]);
        return redirect()->back();
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
