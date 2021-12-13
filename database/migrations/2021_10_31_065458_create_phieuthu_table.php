<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuthuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuthu', function (Blueprint $table) {
            $table->id('pt_ma');
            $table->date('pt_ngaylap');
            $table->integer('pt_tongtien');
            $table->integer('pt_trangthai')->default(0);
            $table->bigInteger('nv_ma')->unsigned();
            $table->foreign('nv_ma')->references('nv_ma')->on('nhanvien')->onDelete('CASCADE');

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
        Schema::dropIfExists('phieuthu');
    }
}
