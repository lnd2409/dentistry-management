<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id('nv_ma');
            $table->string('nv_hoten');
            $table->string('nv_sdt');
            $table->string('nv_namsinh');
            $table->string('nv_diachi');
            $table->string('nv_gioitinh');
            $table->string('nv_taikhoan');
            $table->string('nv_matkhau');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
