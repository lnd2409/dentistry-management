<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDichvuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dichvu', function (Blueprint $table) {
            $table->id('dv_ma');
            $table->string('dv_ten');
            $table->text('dv_mota');
            $table->string('dv_thoigiandukien');

            $table->bigInteger('ldv_ma')->unsigned();
            $table->foreign('ldv_ma')->references('ldv_ma')->on('loaidichvu')->onDelete('CASCADE');

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
        Schema::dropIfExists('dichvu');
    }
}
