<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiadichvucanlamsanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giadichvucanlamsan', function (Blueprint $table) {
            $table->id('gdvcls_id');
            $table->integer('gdvcls_gia');

            $table->bigInteger('ngay_ma')->unsigned();
            $table->foreign('ngay_ma')->references('ngay_ma')->on('ngay')->onDelete('CASCADE');

            $table->bigInteger('cls_ma')->unsigned();
            $table->foreign('cls_ma')->references('cls_ma')->on('canlamsan')->onDelete('CASCADE');

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
        Schema::dropIfExists('giadichvucanlamsan');
    }
}