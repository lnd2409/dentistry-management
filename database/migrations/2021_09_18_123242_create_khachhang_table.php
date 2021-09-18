<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->integer('kh_ma')->primary();
            $table->string('kh_hoten')->nullable();
            $table->string('kh_gioitinh')->nullable();
            $table->string('kh_cmnd')->nullable();
            $table->string('kh_diachi')->nullable();
            $table->string('kh_sdt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
