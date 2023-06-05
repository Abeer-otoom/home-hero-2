<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Trequests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tasker_id')->references('id')->on('taskers');
            $table->foreignId('user_id')->references('id')->on('Users');
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->boolean('result');
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
        Schema::dropIfExists('Trequests');
    }
}
