<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietphieukhamdichvuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphieukhamdichvu', function (Blueprint $table) {
            $table->id('ctpkdv_id');

            $table->bigInteger('dv_ma')->unsigned();
            $table->foreign('dv_ma')->references('dv_ma')->on('dichvu')->onDelete('CASCADE');

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
        Schema::dropIfExists('chitietphieukhamdichvu');
    }
}
