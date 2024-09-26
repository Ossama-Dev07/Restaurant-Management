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
       Schema::create('meal_categorys', function (Blueprint $table) {
        $table->id(); // This creates an auto-incrementing, unsigned big integer (primary key).
        $table->string('name', 100);
        $table->text('description')->nullable();
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
        Schema::dropIfExists('meal_categories');
    }
};
