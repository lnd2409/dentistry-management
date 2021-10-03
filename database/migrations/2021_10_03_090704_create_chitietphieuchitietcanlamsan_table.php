<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietphieuchitietcanlamsanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphieuchitietcanlamsan', function (Blueprint $table) {

            $table->bigInteger('pcd_ma')->unsigned();
            $table->foreign('pcd_ma')->references('pcd_ma')->on('phieuchidinh')->onDelete('CASCADE');

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
        Schema::dropIfExists('chitietphieuchitietcanlamsan');
    }
}
