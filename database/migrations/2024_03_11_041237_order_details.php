<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // Thay đổi từ id('order_detail_id') sang id()
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade'); // Thay đổi từ order_id thành id
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('quantity');
            $table->string('size');
            $table->bigInteger('subtotal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
