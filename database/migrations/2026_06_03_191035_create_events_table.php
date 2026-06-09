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
    Schema::create('events', function (Blueprint $table) {

        $table->id();

        $table->foreignId('category_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->string('title',200);

        $table->string('slug')->unique();

        $table->string('organizer',100);

        $table->longText('description');

        $table->string('thumbnail')->nullable();

        $table->string('banner')->nullable();

        $table->string('venue',200);

        $table->enum('status', [
            'draft',
            'published'
        ])->default('draft');

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
