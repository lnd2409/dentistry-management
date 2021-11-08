<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Ca extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $ca = [
            [
            'ca_giobatdau'=>'7:00',
            'ca_gioketthuc'=>'11:00',
            ],
            [
            'ca_giobatdau'=>'13:00',
            'ca_gioketthuc'=>'17:00',
            ],
            [
            'ca_giobatdau'=>'16:00',
            'ca_gioketthuc'=>'20:00',
            ],

       ];
       DB::table('ca')->insert($ca);
    }
}