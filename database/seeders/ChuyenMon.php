<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChuyenMon extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[[
            'cm_ma'=>1,
            'cm_ten'=>'Đa khoa'
        ],[
            'cm_ma'=>2,
            'cm_ten'=>'Chỉnh hình'
        ]];
        DB::table('chuyenmon')->insert($data);
    }
}