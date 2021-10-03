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
            $table->float('ctt_soluong');
            $table->float('ctt_dongia');

            $table->bigInteger('t_ma')->unsigned();
            $table->foreign('t_ma')->references('t_ma')->on('thuoc')->onDelete('CASCADE');

            $table->bigInteger('pk_ma')->unsigned();
            $table->foreign('pk_ma')->references('pk_ma')->on('phieukham')->onDelete('CASCADE');

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
