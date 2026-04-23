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
        Schema::create('perfumes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('hero_image')->nullable(); // Ensure this is here!
            $table->boolean('is_featured')->default(false);
            $table->text('time_of_day')->nullable(); // For the array cast
            $table->string('longevity')->nullable();
            $table->string('sillage')->nullable();
            $table->string('price')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfumes');

    }
};
