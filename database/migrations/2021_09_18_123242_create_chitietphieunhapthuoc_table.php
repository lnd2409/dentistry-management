<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietphieunhapthuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphieunhapthuoc', function (Blueprint $table) {
            $table->integer('pnt_ma');
            $table->integer('t_ma');
            $table->float('ctpnt_DONGIA')->nullable();
            $table->float('ctpnt_SOLUONG')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietphieunhapthuoc');
    }
}
