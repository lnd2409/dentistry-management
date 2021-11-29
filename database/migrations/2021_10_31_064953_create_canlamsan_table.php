<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanlamsanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canlamsan', function (Blueprint $table) {
            $table->id('cls_ma');
            $table->string('cls_ten');
            $table->string('cls_mota');

            $table->bigInteger('lcls_ma')->unsigned();
            $table->foreign('lcls_ma')->references('lcls_ma')->on('loaicanlamsan')->onDelete('CASCADE');

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
        Schema::dropIfExists('canlamsan');
    }
}
