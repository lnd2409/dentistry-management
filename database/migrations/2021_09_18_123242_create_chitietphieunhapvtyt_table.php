<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietphieunhapvtytTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphieunhapvtyt', function (Blueprint $table) {
            $table->integer('pnvtyt_ma');
            $table->integer('vtyt_ma');
            $table->integer('CTpnvtyt_soluong')->nullable();
            $table->float('CTpnvtyt_dongia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietphieunhapvtyt');
    }
}
