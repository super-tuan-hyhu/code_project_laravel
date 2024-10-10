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
        Schema::create('drivery', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status_1', '50')->default('Chưa có thông tin');
            $table->string('status_2', '50')->default('Chưa có thông tin');
            $table->string('status_3', '50')->default('Chưa có thông tin');
            $table->string('status_4', '50')->default('Chưa có thông tin');
            $table->string('status_5', '50')->default('Chưa có thông tin');
            $table->string('status_6', '50')->default('Chưa có thông tin');
            $table->unsignedInteger('id_order');
            $table->foreign('id_order')->references('id_order')->on('order')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivery');
    }
};
