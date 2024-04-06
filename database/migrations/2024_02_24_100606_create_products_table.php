<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Name_sneaker', 200);
            $table->string('Brand', 35);
            $table->string('Color', 50);
            $table->string('Origin', 26);
            $table->string('Material', 50);
            $table->string('Status_Sneaker', 35);
            $table->string('Product_Code', 20)->unique();
            $table->integer('Price');
            $table->string('Description');
            $table->string('Image')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
