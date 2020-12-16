<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiuntosTable extends Migration
{
    public function up()
    {
        Schema::create('siuntos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('siuntejo_adresas');
            $table->string('gavejo_vardas');
            $table->string('gavejo_pavarde');
            $table->string('gavejo_adresas');
            $table->string('gavejo_epastas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siuntos');
    }
}
