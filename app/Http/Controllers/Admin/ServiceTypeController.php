<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loaidichvu;
use App\Models\Loaidv;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaidv = Loaidichvu::all();

        return view('admin.service_types.index', compact('loaidv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Loaidichvu::create($request->all());

        return redirect()->route('loaidichvu.index')->with('success','Tạo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Loaidv $loaidv
     * @return \Illuminate\Http\Response
     */
    public function show(Loaidichvu $loaidv)
    {
        return view('admin.service_types.show', compact('loaidv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Loaidv $loaidv
     * @return \Illuminate\Http\Response
     */
    public function edit(Loaidichvu $loaidv)
    {
        return view('admin.service_types.edit', compact('loaidv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Loaidv $loaidv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loaidichvu $loaidv)
    {
        $loaidv->update($request->all());

        return redirect()->route('loaidichvu.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Loaidv $loaidv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loaidichvu $loaidv)
    {
        $loaidv->delete();

        return redirect()->route('loaidichvu.index')->with('success','Xóa thành công');
    }
}