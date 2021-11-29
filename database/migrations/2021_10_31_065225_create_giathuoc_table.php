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
            $table->id('gt_ma');
            $table->date('gt_ngay');
            $table->integer('gt_gia');

            $table->bigInteger('thuoc_ma')->unsigned();
            $table->foreign('thuoc_ma')->references('thuoc_ma')->on('thuoc')->onDelete('CASCADE');

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
        Schema::dropIfExists('giathuoc');
    }
}
