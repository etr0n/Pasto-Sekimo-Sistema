<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastoSkyriusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasto_skyrius', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pavadinimas');
            $table->string('adresas');
            $table->string('miestas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasto_skyrius');
    }
}
