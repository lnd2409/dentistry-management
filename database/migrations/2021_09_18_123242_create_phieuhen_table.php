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
            $table->integer('ph_id')->primary();
            $table->integer('nv_ma');
            $table->integer('kh_ma');
            $table->dateTime('ph_ngayhen')->nullable();
            $table->time('ph_giohen')->nullable();
            $table->string('ph_yeucau')->nullable();
            $table->string('ph_trangthai')->nullable();
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
