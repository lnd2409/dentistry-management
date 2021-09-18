<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietphieuchivtytTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietphieuchivtyt', function (Blueprint $table) {
            $table->integer('pc_ma');
            $table->integer('ctpcvtyt_ma');
            $table->text('ctpcvtyt_mota')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietphieuchivtyt');
    }
}
