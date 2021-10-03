<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieukhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieukham', function (Blueprint $table) {
            $table->id('pk_ma');
            $table->date('pk_ngaykham');
            $table->text('pk_ghichu');
            $table->integer('pk_trangthai');
            $table->date('pk_ngaytaikham');

            $table->bigInteger('pt_ma')->unsigned();
            $table->foreign('pt_ma')->references('pt_ma')->on('phieuthu')->onDelete('CASCADE');

            $table->bigInteger('nv_ma')->unsigned();
            $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE');

            $table->bigInteger('hsb_ma')->unsigned();
            $table->foreign('hsb_ma')->references('hsb_ma')->on('khachhang')->onDelete('CASCADE');
            
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
        Schema::dropIfExists('phieukham');
    }
}
