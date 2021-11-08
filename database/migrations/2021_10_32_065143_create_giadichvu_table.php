<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiadichvuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giadichvu', function (Blueprint $table) {
            $table->id('gdv_id');
            $table->integer('gdv_gia');

            $table->bigInteger('ngay_ma')->unsigned();
            $table->foreign('ngay_ma')->references('ngay_ma')->on('ngay')->onDelete('CASCADE');

            $table->bigInteger('dv_ma')->unsigned();
            $table->foreign('dv_ma')->references('dv_ma')->on('dichvu')->onDelete('CASCADE');

            $table->timestamps();
        });
    }

}