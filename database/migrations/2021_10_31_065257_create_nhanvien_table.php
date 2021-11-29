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
            $table->string('nv_ten');
            $table->string('nv_gioitinh')->nullable();
            $table->string('nv_diachi')->nullable();
            $table->string('nv_cmnd')->nullable();
            $table->string('nv_sdt')->nullable();
            $table->string('username');
            $table->string('password');

            $table->bigInteger('cm_ma')->nullable()->unsigned();
            $table->foreign('cm_ma')->references('cm_ma')->on('chuyenmon')->onDelete('CASCADE');

            $table->bigInteger('cv_ma')->nullable()->unsigned();
            $table->foreign('cv_ma')->references('cv_ma')->on('chucvu')->onDelete('CASCADE');

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
