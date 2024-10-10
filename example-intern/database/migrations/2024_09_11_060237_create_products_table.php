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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image', '55');
            $table->integer('price_now');
            $table->integer('discount')->nullable();
            $table->integer('sku');
            $table->string('tag', '20');
            $table->unsignedInteger('id_category');
            $table->foreign('id_category')->references('id')->on('category')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->string('status', '30');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
