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
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id_order');
            $table->string('accepted'); // người nhận
            $table->string('email');
            $table->string('address', '100');
            $table->string('phone', '20');
            $table->string('payment_methods');
            $table->string('country', '20');
            $table->integer('zip');
            $table->string('status')->default('Chưa có thông tin');
            $table->string('account');
            $table->integer('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
