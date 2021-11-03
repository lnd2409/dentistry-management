<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHosobenhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosobenh', function (Blueprint $table) {
            $table->id('hsb_ma');
            $table->bigInteger('hsb_maso');
            $table->date('hsb_ngaylap');
            $table->string('hsb_hotenkhachhang');
            $table->string('hsb_sdt');
            $table->string('hsb_diachi');
            $table->string('hsb_namsinh');
            $table->string('hsb_gioitinh');
            $table->string('hsb_cmnd')->nullable();

            $table->bigInteger('nv_ma')->nullable()->unsigned();
            $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE');

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
        Schema::dropIfExists('hosobenh');
    }
}
