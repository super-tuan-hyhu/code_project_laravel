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
        Schema::table('products', function (Blueprint $table){
            $table->unsignedInteger('id_brand');
            $table->foreign('id_brand')->references('id')->on('brand')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table){
            $table->dropForeign('id_brand');
            $table->dropColumn('id_brand');
        });
    }
};
