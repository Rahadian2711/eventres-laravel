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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')->constrained();

            $table->foreignId('ticket_category_id')->constrained();

            $table->integer('quantity')->default(1);

            $table->decimal('subtotal', 12, 0);

            $table->decimal('service_fee', 12, 0);

            $table->decimal('total', 12, 0);

            $table->string('payment_method')->nullable();

            $table->string('payment_code')->nullable();

            $table->enum('status', [
                'pending',
                'paid',
                'expired',
                'cancelled'
            ])->default('pending');

            $table->timestamp('expired_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
