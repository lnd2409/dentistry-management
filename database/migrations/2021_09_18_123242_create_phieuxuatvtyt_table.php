<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuxuatvtytTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuxuatvtyt', function (Blueprint $table) {
            $table->integer('pxvtyt_ma')->primary();
            $table->integer('nv_ma');
            $table->dateTime('pxvtyt_ngaylap')->nullable();
            $table->float('pxvtyt_tongtien')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieuxuatvtyt');
    }
}
