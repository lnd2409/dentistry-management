<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiadvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giadv', function (Blueprint $table) {

            $table->bigInteger('dv_ma')->unsigned();
            $table->foreign('dv_ma')->references('dv_ma')->on('dichvu')->onDelete('CASCADE');

            $table->bigInteger('ngay_ma')->unsigned();
            $table->foreign('ngay_ma')->references('ngay_ma')->on('ngay')->onDelete('CASCADE');
            
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
        Schema::dropIfExists('giadv');
    }
}
