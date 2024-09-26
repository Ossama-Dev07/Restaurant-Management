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
        Schema::create('meals', function (Blueprint $table) {
        $table->id(); // Primary key (meal_id)
        $table->string('name', 100);
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2);
        
        // Ensure category_id is unsigned and matches the type in meal_categorys
        $table->unsignedBigInteger('category_id')->nullable();

        // Foreign key constraint
        $table->foreign('category_id')
              ->references('id')->on('meal_categorys'); // Optional: cascade on delete

        $table->boolean('is_available')->default(true);
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
        Schema::dropIfExists('meals');
    }
};
