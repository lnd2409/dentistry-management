<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chucvu;
use App\Models\Chuyenmon;
use App\Models\Nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chuyenmon=Chuyenmon::all();
        return view('admin.expertises.index',compact('chuyenmon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.expertises.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Chuyenmon::create($request->all());

        return redirect()->route('expertises.index');
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
    public function edit(Chuyenmon $chuyenmon)
    {
        return view('admin.expertises.edit',compact('chuyenmon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chuyenmon $chuyenmon)
    {
        $chuyenmon->update($request->all());
        return redirect()->route('expertises.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chuyenmon $chuyenmon)
    {
        $check=Nhanvien::where('cm_ma',$chuyenmon->cm_ma)->first();
        if($check){
            
        return redirect()->back()->with('error','Không thể xoá');
        }

        $chuyenmon->delete();

        return redirect()->back()->with('success','Đã xoá thành công');
    }
}