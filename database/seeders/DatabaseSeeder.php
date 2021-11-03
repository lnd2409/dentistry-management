<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $nhanvien = [
       [
        'nv_ten'=>'Trần Thanh Phụng',
        'nv_sdt'=>'099996969',
        
        'nv_diachi'=>'118 Bùi Thị Xuân, NK, CT',
        'nv_gioitinh'=>'nam',
        'username'=>'admin',
        'password' => bcrypt('12345'),
        'cm_ma' => 1,
        'cv_ma' => 2,
       ],
       [
        'nv_ten'=>'Lê Ngọc Đức',
        'nv_sdt'=>'099996969',
        
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
        
        'nv_diachi'=>'118 Bùi Thị Xuân, NK, CT',
        'nv_gioitinh'=>'Nữ',
        'username'=>'lnnghia',
        'password' => bcrypt('12345'),
        'cm_ma' => 1,
        'cv_ma' => 2,
       ],

       ];
       DB::table('nhanvien')->insert($nhanvien);
       $this->call(ChucVu::class);
       $this->call(ChuyenMon::class);
       $this->call(NhanVien::class);
    }
}