<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDongiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dongia', function (Blueprint $table) {
            $table->integer('dongia')->unsigned();

            $table->bigInteger('cls_ma')->unsigned();
            $table->foreign('cls_ma')->references('cls_ma')->on('canlamsan')->onDelete('CASCADE');

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
        Schema::dropIfExists('dongia');
    }
}
