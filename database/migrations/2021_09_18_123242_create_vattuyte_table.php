<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVattuyteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vattuyte', function (Blueprint $table) {
            $table->integer('vtyt_ma')->primary();
            $table->integer('lvt_ma');
            $table->integer('nsx_ma');
            $table->integer('dvt_ma');
            $table->string('vtyt_ten')->nullable();
            $table->dateTime('vtyt_hansudung')->nullable();
            $table->float('vtyt_soluong')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vattuyte');
    }
}
