<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietphieuxuatthuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphieuxuatthuoc', function (Blueprint $table) {
            $table->integer('t_ma');
            $table->integer('pxt_ma');
            $table->float('ctpxt_dongia')->nullable();
            $table->float('ctpxt_SOLUONG')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietphieuxuatthuoc');
    }
}
