<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chucvu;
use App\Models\Chuyenmon;
use App\Models\Nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanvien=Nhanvien::all();
        return view('admin.staffs.index',compact('nhanvien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chuyenmon=Chuyenmon::all();
        $chucvu=Chucvu::all();
        return view('admin.staffs.create',compact('chucvu','chuyenmon'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check=Nhanvien::where('username',$request->username)->first();
        if($check){
            return back()->with('warning','Username đã tồn tại');
        }
        $request->merge(['password'=>Hash::make($request->password)]);
        Nhanvien::create($request->all());

        return redirect()->route('staffs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nhanvien $nhanvien)
    {
        $chucvu=Chucvu::all();
        $chuyenmon=Chuyenmon::all();
        return view('admin.staffs.edit',compact('nhanvien','chucvu','chuyenmon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nhanvien $nhanvien)
    {
        $request->password?$request->merge(['password'=>Hash::make($request->password)]):$request->request->remove('password');
        $nhanvien->update($request->all());
        return redirect()->route('staffs.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nhanvien $nhanvien)
    {
        $nhanvien->delete();
        return redirect()->back();
    }
}