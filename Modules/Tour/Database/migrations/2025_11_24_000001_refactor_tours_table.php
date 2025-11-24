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
        Schema::dropIfExists('tour_translations');

        Schema::table('tours', function (Blueprint $table) {
            $table->json('slug')->nullable();
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->json('itenary_title')->nullable();
            $table->json('itenary_section')->nullable();
            $table->json('included')->nullable();
            $table->json('excluded')->nullable();
            $table->json('duration')->nullable();
            $table->json('places')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['slug', 'title', 'description', 'itenary_title', 'itenary_section', 'included', 'excluded', 'duration', 'places']);
        });
    }
};
