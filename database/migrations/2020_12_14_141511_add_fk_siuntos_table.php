<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkSiuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siuntos', function (Blueprint $table) {
            $table->bigInteger('busena_id')->unsigned();
            $table->foreign('busena_id')->references('id')->on('busenos')->onDelete('cascade');

            $table->bigInteger('ivykiulaikas_id')->unsigned();
            $table->foreign('ivykiulaikas_id')->references('id')->on('ivykiu_laikai')->onDelete('cascade');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siuntos', function (Blueprint $table) {
            $table-> dropForeign('siuntos_busena_id_foreign');
            $table->dropColumn('busena_id');

            $table-> dropForeign('siuntos_ivykiulaikas_id_foreign');
            $table->dropColumn('ivykiulaikas_id');

            $table-> dropForeign('siuntos_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
