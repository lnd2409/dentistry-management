<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieunhapthuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieunhapthuoc', function (Blueprint $table) {
            $table->integer('pnt_ma')->primary();
            $table->integer('nv_ma');
            $table->dateTime('pnt_ngaylap')->nullable();
            $table->float('pnt_tongtien')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieunhapthuoc');
    }
}
