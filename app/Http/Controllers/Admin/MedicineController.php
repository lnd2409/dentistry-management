<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Thuoc;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thuoc = Thuoc::all();

        return view('admin.medicines.index', compact('thuoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thuoc=Thuoc::create($request->all());
        $thuoc->gia()->create([
            't_ma'=>$thuoc->t_ma,
            'gt_ngay'=>date('Y-m-d H:i:s'),
            'gt_gia'=>$request->gt_gia
        ]);

        return redirect()->route('thuoc.index')->with('success', 'Đã thêm thuốc');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thuoc $thuoc
     * @return \Illuminate\Http\Response
     */
    public function show(Thuoc $thuoc)
    {
        return view('admin.medicines.show', compact('thuoc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thuoc $thuoc
     * @return \Illuminate\Http\Response
     */
    public function edit(Thuoc $thuoc)
    {
        return view('admin.medicines.edit', compact('thuoc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Thuoc $thuoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thuoc $thuoc)
    {
        $thuoc->update($request->all());
        if($request->gt_gia!= $thuoc->gia->gt_gia){
            $thuoc->gia()->create([
                't_ma'=>$thuoc->t_ma,
                'gt_ngay'=>date('Y-m-d H:i:s'),
                'gt_gia'=>$request->gt_gia
            ]);
        }

        return redirect()->route('thuoc.index')->with('success', 'Đã cập nhật thuốc');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thuoc $thuoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thuoc $thuoc)
    {
        $thuoc->delete();

        return back()->with('success', 'Đã xóa thuốc');
    }
}
