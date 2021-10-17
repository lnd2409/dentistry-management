<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dichvu;
use App\Models\Loaidv;
use Illuminate\Http\Request;

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
        $ldv=Loaidv::all();
        return view('admin.services.create',compact('ldv'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dichvu::create($request->all());

        return redirect()->route('dichvu.index')->with('success', 'Thêm dịch vụ thành công');
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
        $ldv=Loaidv::all();

        return view('admin.services.edit', compact('dichvu','ldv'));
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
        $dichvu->update($request->all());

        return redirect()->route('dichvu.index')->with('success', 'Cập nhật dịch vụ thành công');
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
