<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuchidinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuchidinh', function (Blueprint $table) {
            $table->id('pcd_ma');
            $table->date('pcd_ngaylap');
            $table->string('pcd_ketqua');
            $table->text('pcd_ghichu');
            
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
        Schema::dropIfExists('phieuchidinh');
    }
}
