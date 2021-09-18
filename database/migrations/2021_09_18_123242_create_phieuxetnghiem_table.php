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
            $table->integer('pxn_ma')->primary();
            $table->integer('pk_ma');
            $table->dateTime('pxn_ngaylap')->nullable();
            $table->text('pxn_ketqua')->nullable();
            $table->text('pxn_ghichu')->nullable();
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
