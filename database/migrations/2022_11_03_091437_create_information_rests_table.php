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
        Schema::create('information_rests', function (Blueprint $table) {
            $table->id();
            $table->string('rest_name');
            $table->string('rest_type');
            $table->string('food_type')->nullable();
            $table->string('address');
            $table->bigInteger('phone');
            $table->bigInteger('account_number');
            $table->string('image')->nullable();
            $table->enum('state' , ['open' , 'close'])->default('close');
            $table->bigInteger('post_cash')->nullable();
            $table->string('work_times')->nullable();
            $table->foreignId('seller_id')->references('id')->on('sellers');
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
        Schema::dropIfExists('information_rests');
    }
};
