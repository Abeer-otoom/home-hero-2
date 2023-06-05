<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tasker_id')->references('id')->on('taskers');
            $table->foreignId('user_id')->references('id')->on('Users');
            $table->string('location');
            $table->date('date');
            $table->time('hour');
            $table->text('desc');
            $table->string('image');
            $table->foreignId('orders_status_id')->nullable()->references('id')->on('orders_status');
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
        Schema::dropIfExists('orders');
    }
}
