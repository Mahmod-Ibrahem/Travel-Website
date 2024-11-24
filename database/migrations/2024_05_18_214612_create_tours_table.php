<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('slug');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('group');
            $table->text('preference')->default('')->nullable();
            $table->text('title');
            $table->text('description');
            $table->string('tour_cover');
            $table->text('itenary_title')->nullable();
            $table->text('itenary_section')->nullable();
            $table->text('included')->nullable();
            $table->text('excluded')->nullable();
                    $table->text('duration')->nullable();
            $table->unsignedBigInteger('price_per_person');
            $table->unsignedBigInteger('price_two_five');
            $table->unsignedBigInteger('price_six_twenty');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
