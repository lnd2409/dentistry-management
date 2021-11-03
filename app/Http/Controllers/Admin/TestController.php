<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Canlamsan;
use App\Models\Loaicanlamsan;
use App\Models\Loaicl;
use App\Models\Ngay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canlamsan = Canlamsan::all();

        return view('admin.tests.index', compact('canlamsan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lcls = Loaicanlamsan::all();

        return view('admin.tests.create', compact('lcls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $cls = Canlamsan::create($request->all());
            $ngay = Ngay::create(['ngay' => date('Y-m-d')]);
            $cls->dongia()->create([
                'cls_ma' => $cls->cls_ma,
                'ngay_ma' => $ngay->ngay_ma,
                'gdvcls_gia' => $request->dongia

            ]);
            DB::commit();
            return redirect()->route('xetnghiem.index')->with('success', 'Thêm thành công');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Canlamsan $canlamsan
     * @return \Illuminate\Http\Response
     */
    public function show(Canlamsan $canlamsan)
    {
        return view('admin.tests.show', compact('canlamsan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Canlamsan $canlamsan
     * @return \Illuminate\Http\Response
     */
    public function edit(Canlamsan $canlamsan)
    {
        $lcls = Loaicanlamsan::all();

        return view('admin.tests.edit', compact('canlamsan', 'lcls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Canlamsan $canlamsan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Canlamsan $canlamsan)
    {
        DB::beginTransaction();
        try {
            $canlamsan->update($request->all());
            if ($request->dongia != $canlamsan->dongia->dongia) {
                $ngay = Ngay::create(['ngay' => date('Y-m-d')]);
                $canlamsan->dongia()->create([
                    'cls_ma' => $canlamsan->cls_ma,
                    'ngay_ma' => $ngay->ngay_ma,
                    'gdvcls_gia' => $request->dongia
                ]);
            }

            DB::commit();
            return redirect()->route('xetnghiem.index')->with('success', 'Cập nhật thành công');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Canlamsan $canlamsan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Canlamsan $canlamsan)
    {
        $canlamsan->delete();

        return back()->with('message', 'item deleted successfully');
    }
}