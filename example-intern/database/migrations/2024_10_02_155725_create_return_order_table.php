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
        Schema::create('return_order', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('customer_id'); // mã khách hàng
            $table->decimal('total_refund_amount', 10, 2);
            $table->string('refund_status')->default('Pending'); // Trạng thái hoàn trả (Pending, Approved, Rejected)
            $table->text('reason'); // Lý do hoàn trả
            $table->foreign('order_id')->references('id_order')->on('order')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_order');
    }
};
