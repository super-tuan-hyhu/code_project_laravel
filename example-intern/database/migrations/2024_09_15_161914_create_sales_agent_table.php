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
        Schema::create('sales_agent', function (Blueprint $table) {
            $table->increments('id_sales');
            $table->string('name');
            $table->string('avatar', '100');
            $table->string('email')->unique();
            $table->string('phone', 13)->nullable();
            $table->string('address', '50');
            $table->string('province', '40');
            $table->string('country', '20');
            $table->integer('gender');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_agent');
    }
};
