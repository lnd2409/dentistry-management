<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ca;
use App\Models\Lichtruc;
use App\Models\Ngay;
use App\Models\Nhanvien;
use App\Models\Phong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanvien=Nhanvien::all();
        $lichtruc=Lichtruc::all();
        $ca=Ca::all();
        $phong=Phong::all();
       
        return view('admin.schedules.index',compact('nhanvien','ca','phong'));
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
        DB::beginTransaction();
        try {
            $ngay = Ngay::firstOrCreate(['ngay' => $request->ngay_ma]);
            $request->merge(['ngay_ma'=>$ngay->ngay_ma]);
            Lichtruc::create($request->all());

            DB::commit();
            return redirect()->route('schedules.index')->with('success', 'Thêm lịch trực thành công');
        } catch (\Exception $e) {
            DB::rollBack();
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Lichtruc::where('lt_ma',$request->id)->delete();

        return response()->json('success', 200);
    }

    public function getSchedule()
    {
        $lichtruc=Lichtruc::orderBy('ca_ma', 'ASC')->get();
        $schedule=[];
        foreach ($lichtruc as $key => $value) {
            $start=$value->ngay->ngay->format('Y-m-d');
            $end=$value->ngay->ngay->format('Y-m-d');
            if($value->ca->ca_ma!=3){
                $start.='T'.$value->ca->ca_giobatdau;
                $end.='T'.$value->ca->ca_gioketthuc;
            }
            $x = (object) [
                'title' => $value->nhanvien->chucvu->cv_ten.' - '.$value->nhanvien->nv_ten,
                'description' => $value->nhanvien->nv_ten,
                'start' => $start,
                'end' => $end,
                'id'=>$value->lt_ma
            ];
            $schedule[$key]=$x;
        }
         return response()->json($schedule, 200);
    }
}