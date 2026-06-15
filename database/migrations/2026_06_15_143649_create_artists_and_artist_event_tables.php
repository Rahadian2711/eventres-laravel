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
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('bio')->nullable();
            $table->string('genre')->nullable();
            $table->timestamps();
        });

        Schema::create('artist_event', function (Blueprint $table) {
            $table->foreignId('artist_id')->constrained()->onDelete('cascade');
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->primary(['artist_id', 'event_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artist_event');
        Schema::dropIfExists('artists');
    }
};
