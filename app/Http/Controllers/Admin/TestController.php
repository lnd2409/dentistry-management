<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Canlamsan;
use App\Models\Loaicl;
use Illuminate\Http\Request;

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
        $lcls=Loaicl::all();

        return view('admin.tests.create',compact('lcls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Canlamsan::create($request->all());

        return redirect()->route('xetnghiem.index')->with('success', 'Thêm thành công');
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
        $lcls=Loaicl::all();

        return view('admin.tests.edit', compact('canlamsan','lcls'));
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
        $canlamsan->update($request->all());

        return redirect()->route('xetnghiem.index')->with('success', 'Cập nhật thành công');
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
