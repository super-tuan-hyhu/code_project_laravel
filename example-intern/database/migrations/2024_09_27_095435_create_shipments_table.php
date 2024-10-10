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
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id_driver');
            $table->string('shipments_1')->default('Chưa nhận đơn');
            $table->string('shipments_2')->default('Chưa xử lý');
            $table->string('shipments_3')->default('Chưa xử lý');
            $table->string('shipments_4')->default('Chưa xử lý');
            $table->string('shipments_5')->default('Chưa xử lý');
            $table->string('shipments_6')->default('Chưa xử lý');
            $table->string('shipments_7')->default('Chưa hoàn thành');
            $table->string('cancel_8')->default('Chưa xử lý');
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id_order')->on('order')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
