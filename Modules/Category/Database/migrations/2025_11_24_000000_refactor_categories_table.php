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
        Schema::dropIfExists('category_translations');

        Schema::table('categories', function (Blueprint $table) {
            $table->json('slug')->nullable();
            $table->json('name')->nullable();
            $table->json('header')->nullable();
            $table->json('bg_header')->nullable();
            $table->json('description')->nullable();
            $table->json('title_meta')->nullable();
            $table->json('description_meta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['slug', 'name', 'header', 'bg_header', 'description', 'title_meta', 'description_meta']);
        });
    }
};
