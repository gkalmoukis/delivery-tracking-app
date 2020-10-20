<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableDeliveriesDropSomeColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deliveries', function (Blueprint $table) {
            // $table->dropForeign('deliveries_supermarket_id_foreign');
            // $table->dropForeign('deliveries_user_id_foreign');
            // $table->dropColumn('supermarket_id');
            // $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deliveries', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('supermarket_id');
            $table->foreign('supermarket_id')->references('id')->on('supermarkets');
        });
    }
}
