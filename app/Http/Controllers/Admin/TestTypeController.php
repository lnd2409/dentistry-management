<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loaicl;
use Illuminate\Http\Request;

class TestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaicls = Loaicl::all();

        return view('admin.test_types.index', compact('loaicls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.test_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Loaicl::create($request->all());

        return redirect()->route('loaixetnghiem.index')->with('success', 'Thêm loại cận lâm sàn thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loaicl $loaicl
     * @return \Illuminate\Http\Response
     */
    public function show(Loaicl $loaicl)
    {
        return view('admin.test_types.show', compact('loaicl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loaicl $loaicl
     * @return \Illuminate\Http\Response
     */
    public function edit(Loaicl $loaicl)
    {
        return view('admin.test_types.edit', compact('loaicl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Loaicl $loaicl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loaicl $loaicl)
    {
        $loaicl->update($request->all());

        return redirect()->route('loaixetnghiem.index')->with('success', 'Cập nhật loại cận lâm sàn thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loaicl $loaicl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loaicl $loaicl)
    {
        $loaicl->delete();

        return back()->with('success', 'Xóa thành công');
    }
}
