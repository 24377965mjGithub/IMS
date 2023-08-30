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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productImage');
            $table->integer('productCategoryId');
            $table->integer('suppliersId');
            $table->string('productBarCode')->nullable();
            $table->string('productName');
            $table->text('productDescription')->nullable();
            $table->string('productPrice');
            $table->integer('productQuantity');
            $table->string('productUnit');
            $table->string('productStatus');
            $table->string('productCost');
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
        Schema::dropIfExists('products');
    }
};
