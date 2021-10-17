<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiathuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giathuoc', function (Blueprint $table) {
            $table->dateTime('gt_ngay')->primary();
            $table->bigInteger('gt_gia')->unsigned();
            $table->bigInteger('t_ma')->unsigned();
            $table->foreign('t_ma')->references('t_ma')->on('thuoc')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giathuoc');
    }
}
