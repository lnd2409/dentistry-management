<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietphieuxuatvtytTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphieuxuatvtyt', function (Blueprint $table) {
            $table->integer('pxvtyt_ma');
            $table->integer('vtyt_ma');
            $table->float('ctpxvtyt_soluong')->nullable();
            $table->float('ctpxvtyt_ma')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietphieuxuatvtyt');
    }
}
