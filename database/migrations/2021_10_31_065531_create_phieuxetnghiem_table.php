<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuxetnghiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuxetnghiem', function (Blueprint $table) {
            $table->id('pxn_ma');
            $table->date('pxn_ngaylap');
            $table->text('pxn_ghichu');
            $table->text('pxn_ketqua');

            $table->bigInteger('pk_ma')->unsigned();
            $table->foreign('pk_ma')->references('pk_ma')->on('phieukham')->onDelete('CASCADE');

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
        Schema::dropIfExists('phieuxetnghiem');
    }
}
