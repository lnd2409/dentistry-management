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
            'ca_giobatdau'=>'07:30',
            'ca_gioketthuc'=>'12:00',
            ],
            [
            'ca_giobatdau'=>'13:00',
            'ca_gioketthuc'=>'17:30',
            ],
            [
            'ca_giobatdau'=>'07:30',
            'ca_gioketthuc'=>'17:30',
            ],

       ];
       DB::table('ca')->insert($ca);
    }
}
