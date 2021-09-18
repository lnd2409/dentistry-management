<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieunhapvtytTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieunhapvtyt', function (Blueprint $table) {
            $table->integer('pnvtyt_ma')->primary();
            $table->integer('nv_ma');
            $table->dateTime('pnvtyt_ngaylap')->nullable();
            $table->float('pnvtyt_tongtien')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieunhapvtyt');
    }
}
