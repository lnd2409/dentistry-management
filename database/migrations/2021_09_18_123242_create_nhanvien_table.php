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
            $table->integer('nv_ma')->primary();
            $table->integer('cv_ma');
            $table->integer('vm_ma');
            $table->string('nv_hoten')->nullable();
            $table->string('nv_gioitinh')->nullable();
            $table->string('nv_diachi')->nullable();
            $table->string('nv_cmnd')->nullable();
            $table->string('nv_sdt')->nullable();
            $table->string('nv_taikhoan')->nullable();
            $table->string('nv_matkhau')->nullable();
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
