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
            $table->integer('pk_ma')->primary();
            $table->integer('kh_ma');
            $table->integer('nv_ma');
            $table->dateTime('pk_ngaykham')->nullable();
            $table->text('pk_ghichu')->nullable();
            $table->integer('pk_trangthai')->nullable();
            $table->dateTime('pk_ngaytaikham')->nullable();
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
