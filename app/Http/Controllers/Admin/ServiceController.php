<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dichvu;
use App\Models\Loaidichvu;
use App\Models\Loaidv;
use App\Models\Ngay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dichvu = Dichvu::all();

        return view('admin.services.index', compact('dichvu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ldv = Loaidichvu::all();
        return view('admin.services.create', compact('ldv'));
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
            $dv = Dichvu::create($request->all());
            $ngay = Ngay::create(['ngay' => date('Y-m-d')]);
            $dv->giadv()->create([
                'dv_ma' => $dv->dv_ma,
                'ngay_ma' => $ngay->ngay_ma,
                'gdv_gia' => $request->dongia
            ]);


            DB::commit();
            return redirect()->route('dichvu.index')->with('success', 'Cập nhật dịch vụ thành công');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dichvu $dichvu
     * @return \Illuminate\Http\Response
     */
    public function show(Dichvu $dichvu)
    {
        return view('admin.services.show', compact('dichvu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dichvu $dichvu
     * @return \Illuminate\Http\Response
     */
    public function edit(Dichvu $dichvu)
    {
        $ldv = Loaidichvu::all();

        return view('admin.services.edit', compact('dichvu', 'ldv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Dichvu $dichvu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dichvu $dichvu)
    {
        DB::beginTransaction();
        try {
            $dichvu->update($request->all());

            if ($request->dongia != $dichvu->giadv->dongia) {
                $ngay = Ngay::create(['ngay' => date('Y-m-d')]);
                $dichvu->giadv()->create([
                    'dv_ma' => $dichvu->dv_ma,
                    'ngay_ma' => $ngay->ngay_ma,
                    'gdv_gia' => $request->dongia
                ]);
            }

            DB::commit();
            return redirect()->route('dichvu.index')->with('success', 'Cập nhật dịch vụ thành công');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dichvu $dichvu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dichvu $dichvu)
    {
        $dichvu->delete();

        return back()->with('message', 'item deleted successfully');
    }
}