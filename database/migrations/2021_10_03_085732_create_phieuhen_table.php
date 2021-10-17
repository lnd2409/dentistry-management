<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuhenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuhen', function (Blueprint $table) {
            $table->id('ph_ma');
            $table->date('ph_ngayhen');
            $table->time('ph_giohen');
            $table->string('ph_yeucau');
            $table->string('ph_trangthai');

            $table->bigInteger('nv_ma')->nullable()->unsigned();
            $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE');
            $table->bigInteger('hsb_ma')->unsigned();
            $table->foreign('hsb_ma')->references('hsb_ma')->on('khachhang')->onDelete('CASCADE');


            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieuhen');
    }
}
