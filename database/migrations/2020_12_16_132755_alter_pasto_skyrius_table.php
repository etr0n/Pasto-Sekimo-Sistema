<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPastoSkyriusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pasto_skyrius', function (Blueprint $table) {
            $table->renameColumn('e_pastas', 'el_paštas');
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
            $table->renameColumn('el_paštas','e_pastas');
        });
    }
}
