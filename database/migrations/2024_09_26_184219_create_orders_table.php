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
        Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('customer_id'); 
    $table->unsignedBigInteger('table_id'); 
    $table->unsignedBigInteger('employee_id'); 
    $table->dateTime('order_date')->default(DB::raw('CURRENT_TIMESTAMP'));
    $table->enum('status', ['pending', 'preparing', 'ready', 'delivered', 'cancelled'])->default('pending');
    $table->decimal('total_amount', 10, 2)->nullable();
    $table->enum('order_type', ['in-restaurant', 'delivery']);

    $table->foreign('customer_id')
          ->references('id')
          ->on('customers'); 
    $table->foreign('employee_id')
          ->references('id')
          ->on('employees'); 
    $table->foreign('table_id')
          ->references('id')
          ->on('tables'); 
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
};
