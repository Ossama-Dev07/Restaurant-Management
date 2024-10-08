<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
    $table->id('order_detail_id');
    $table->unsignedBigInteger('order_id'); 
    $table->unsignedBigInteger('meal_id'); 
    $table->integer('quantity');
    $table->decimal('price', 10, 2);
    $table->foreign('order_id')
          ->references('id')
          ->on('orders'); 
    $table->foreign('meal_id')
          ->references('id')
          ->on('meals'); 
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
        Schema::dropIfExists('order_details');
    }
};
