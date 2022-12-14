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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('food_name');
            $table->string('material')->nullable();
            $table->string('price');
            $table->string('image')->nullable();
            $table->string('food_cat');
            $table->foreignId('food_cat_id')->references('id')->on('food_categories');
            $table->foreignId('restaurant_id')->references('id')->on('users');
            $table->string('discount')->nullable();
            $table->enum('food_party' , ['yes' , 'no'])->default('no');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
};
