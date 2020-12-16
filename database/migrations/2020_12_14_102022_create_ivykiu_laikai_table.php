<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIvykiuLaikaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ivykiu_laikai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data_paimta')->nullable();
            $table->date('data_siunciama')->nullable();
            $table->date('data_atsiimta')->nullable();
            $table->date('data_ivykdyta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ivykiu_laikai');
    }
}
