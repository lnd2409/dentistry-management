<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichtrucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichtruc', function (Blueprint $table) {
            $table->id('lt_ma');

            $table->bigInteger('ca_ma')->unsigned();
            $table->foreign('ca_ma')->references('ca_ma')->on('ca')->onDelete('CASCADE');

            $table->bigInteger('p_ma')->unsigned();
            $table->foreign('p_ma')->references('p_ma')->on('phong')->onDelete('CASCADE');

            $table->bigInteger('nv_ma')->unsigned();
            $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lichtruc');
    }
}
