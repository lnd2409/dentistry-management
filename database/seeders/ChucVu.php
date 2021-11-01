<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[[
            'cv_ma'=>1,
            'cv_ten'=>'Y tá'
        ],[
            'cv_ma'=>2,
            'cv_ten'=>'Bác sĩ'
        ],[
            'cv_ma'=>3,
            'cv_ten'=>'Quản lý kho'
        ],[
            'cv_ma'=>4,
            'cv_ten'=>'Kế toán'
        ],[
            'cv_ma'=>5,
            'cv_ten'=>'Admin'
        ]];
        DB::table('chucvu')->insert($data);
    }
}