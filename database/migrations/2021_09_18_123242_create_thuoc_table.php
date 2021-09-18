<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thuoc', function (Blueprint $table) {
            $table->integer('t_ma')->primary();
            $table->integer('dvt_ma');
            $table->string('t_ten')->nullable();
            $table->string('t_hoachat')->nullable();
            $table->float('t_soluong')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thuoc');
    }
}
