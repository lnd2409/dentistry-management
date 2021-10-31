<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietthuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietthuoc', function (Blueprint $table) {
            $table->id('ctt_ma');
            $table->integer('ctt_soluong');
            $table->integer('ctt_gia');

            $table->bigInteger('pk_ma')->unsigned();
            $table->foreign('pk_ma')->references('pk_ma')->on('phieukham')->onDelete('CASCADE');

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
        Schema::dropIfExists('chitietthuoc');
    }
}
