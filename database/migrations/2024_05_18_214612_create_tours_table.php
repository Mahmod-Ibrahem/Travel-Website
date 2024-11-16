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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('city')->nullable();
            $table->string('title')->nullable();
            $table->text('places')->nullable();
            $table->text('OfferType')->default('normal');
            $table->text('Tourtype')->default('Daytour');
            $table->text('itenary_title')->default('');
            $table->text('itenary_section')->default('');
            $table->text('included')->default('');
            $table->text('excluded')->default('');
            $table->text('Duration')->default('');
            $table->text('MaxPeople')->default('');
            $table->text('Popular')->default('Yes');
            $table->unsignedBigInteger('price')->nullable();
            $table->string('path')->nullable();
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
