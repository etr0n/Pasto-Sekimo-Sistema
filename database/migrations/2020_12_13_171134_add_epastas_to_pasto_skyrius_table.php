<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEpastasToPastoSkyriusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasto_skyrius', function (Blueprint $table) {
            $table->string('e_pastas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasto_skyrius', function (Blueprint $table) {
            $table->dropColumn('e_pastas');
        });
    }
}
