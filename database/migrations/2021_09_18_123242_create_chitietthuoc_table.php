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
            $table->integer('t_ma');
            $table->integer('pk_ma');
            $table->float('ctt_soluong')->nullable();
            $table->float('ctt_dongia')->nullable();
            
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
