<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('return_order_detail', function (Blueprint $table) {
            $table->increments('id_return');
            $table->unsignedInteger('return_order_id');
            $table->unsignedInteger('product_id');
            $table->integer('quantity');
            $table->decimal('refund_amount', 10, 2);
            $table->foreign('return_order_id')->references('id')->on('return_order')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_order_detail');
    }
};
