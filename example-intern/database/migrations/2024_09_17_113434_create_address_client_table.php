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
        Schema::create('address_client', function (Blueprint $table) {
            $table->increments('id_address');
            $table->string('full_name');
            $table->integer('phone');
            $table->string('city');
            $table->string('district');
            $table->string('wards');
            $table->string('specific_address');
            $table->string('default');
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_client');
    }
};
