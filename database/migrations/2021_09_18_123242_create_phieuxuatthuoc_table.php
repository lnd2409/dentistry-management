<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhieuxuatthuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieuxuatthuoc', function (Blueprint $table) {
            $table->integer('pxt_ma')->primary();
            $table->integer('nv_ma');
            $table->date('pxt_ngaylap')->nullable();
            $table->float('pxt_tongtien')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieuxuatthuoc');
    }
}
