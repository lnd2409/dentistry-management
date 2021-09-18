<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietdungthuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdungthuoc', function (Blueprint $table) {
            $table->integer('t_ma');
            $table->integer('pk_ma');
            $table->float('ctdt_soluong')->nullable();
            $table->float('ctdt_lieuluong')->nullable();
            $table->text('ctdt_cachdung')->nullable();
            $table->float('ctdt_songayuong')->nullable();
            $table->text('ctdt_ghichu')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietdungthuoc');
    }
}
