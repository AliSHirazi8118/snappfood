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
            $table->string('user_name');
            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('restaurant');
            $table->foreignId('restaurant_id')->references('id')->on('information_rests')->onUpdate('cascade')->onDelete('cascade');
            $table->string('orders');
            $table->string('order_cash');
            $table->string('post_cash');
            $table->string('discount_code')->nullable();
            $table->foreignId('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('state' , ['pending' , 'preparing' , 'Posted', 'received'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
};
