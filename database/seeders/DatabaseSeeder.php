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
       'nv_hoten'=>'Trần Thanh Phụng',
       'nv_sdt'=>'099996969',
       'nv_namsinh'=>'01/01/1998',
       'nv_diachi'=>'118 Bùi Thị Xuân, NK, CT',
       'nv_gioitinh'=>'Nữ',
       'username'=>'ttphung',
       'password' => bcrypt('12345'),
       ],
       [
       'nv_hoten'=>'Lê Ngọc Đức',
       'nv_sdt'=>'099996969',
       'nv_namsinh'=>'01/01/1998',
       'nv_diachi'=>'118 Bùi Thị Xuân, NK, CT',
       'nv_gioitinh'=>'Nữ',
       'username'=>'lnduc',
       'password' => bcrypt('12345'),
       ],
       [
       'nv_hoten'=>'Lê Minh Nghĩa',
       'nv_sdt'=>'099996969',
       'nv_namsinh'=>'01/01/1998',
       'nv_diachi'=>'118 Bùi Thị Xuân, NK, CT',
       'nv_gioitinh'=>'Nữ',
       'username'=>'lnnghia',
       'password' => bcrypt('12345'),
       ],

       ];
       DB::table('nhanvien')->insert($nhanvien);
    }
}
