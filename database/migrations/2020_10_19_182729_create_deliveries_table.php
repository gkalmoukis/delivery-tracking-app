<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('supermarket_id');
            $table->foreign('supermarket_id')->references('id')->on('supermarkets');
            $table->string('client')->nullable();
            $table->string('phone')->nullable();
            $table->string('apartment')->nullable();
            $table->geometry('adderss')->nullable();
            $table->text('notes')->nullable();
            $table->date('started_at')->nullable();
            $table->date('delivered_at')->nullable();
            $table->date('canceled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
