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
            $table->string('ph_hoten')->nullable();
            $table->string('ph_maso')->nullable();
            $table->string('ph_sdt')->nullable();
            $table->string('ph_email')->nullable();
            $table->date('ph_ngayhen');
            $table->time('ph_giohen');
            $table->text('ph_yeucau');
            $table->integer('ph_trangthai')->default(0);

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
        Schema::dropIfExists('phieuhen');
    }
}
