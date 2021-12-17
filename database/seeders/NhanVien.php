<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $nhanvien = [
       [
       'nv_ten'=>'Trần Thanh Phụng',
       'nv_sdt'=>'099996969',
       'nv_cmnd'=>'099996969',
       'nv_diachi'=>'118 Bùi Thị Xuân, NK, CT',
       'nv_gioitinh'=>'Nam',
       'username'=>'admin',
       'password' => bcrypt('12345'),
       'cm_ma' => 2,
       'cv_ma' => 3,
       ],
       [
       'nv_ten'=>'Nguyễn Văn Vinh',
       'nv_sdt'=>'099996969',
       'nv_cmnd'=>'099996969',
       'nv_diachi'=>'118 Bùi Thị Xuân, NK, CT',
       'nv_gioitinh'=>'Nữ',
       'username'=>'nvvinh',
       'password' => bcrypt('12345'),
       'cm_ma' => 2,
       'cv_ma' => 3,
       ],
       [
       'nv_ten'=>'Trần Thanh Phụng',
       'nv_sdt'=>'099996969',
       'nv_cmnd'=>'099996969',
       'nv_diachi'=>'118 Bùi Thị Xuân, NK, CT',
       'nv_gioitinh'=>'Nữ',
       'username'=>'ttphung',
       'password' => bcrypt('12345'),
       'cm_ma' => 2,
       'cv_ma' => 3,
       ],
       [
       'nv_ten'=>'Lê Ngọc Đức',
       'nv_sdt'=>'099996969',
       'nv_cmnd'=>'099996969',
       'nv_diachi'=>'118 Bùi Thị Xuân, NK, CT',
       'nv_gioitinh'=>'Nữ',
       'username'=>'lnduc',
       'password' => bcrypt('12345'),
       'cm_ma' => 1,
       'cv_ma' => 2,
       ],
       [
       'nv_ten'=>'Lê Minh Nghĩa',
       'nv_sdt'=>'099996969',
       'nv_cmnd'=>'099996969',
       'nv_diachi'=>'118 Bùi Thị Xuân, NK, CT',
       'nv_gioitinh'=>'Nữ',
       'username'=>'lnnghia',
       'password' => bcrypt('12345'),
       'cm_ma' => 1,
       'cv_ma' => 1,
       ],

       ];
       DB::table('nhanvien')->insert($nhanvien);
    }
}