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
        Schema::create('product_failures', function (Blueprint $table) {
            $table->id();
            $table->integer('productCategoryId');
            $table->integer('suppliersId');
            $table->integer('productId');
            $table->text('reason');
            $table->integer('quantity');
            $table->integer('userId');
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
        Schema::dropIfExists('product_failures');
    }
};
