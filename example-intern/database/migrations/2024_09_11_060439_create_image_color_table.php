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
        Schema::create('image_color', function (Blueprint $table) {
            $table->increments('id_image');
            $table->unsignedInteger('id_color');
            $table->foreign('id_color')->references('id_color')->on('color')->onDelete('cascade');
            $table->string('image_pro', '100');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_color');
    }
};
