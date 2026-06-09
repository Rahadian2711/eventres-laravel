<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->string('order_code')
                ->nullable()
                ->after('id');

            $table->string('transaction_id')
                ->nullable()
                ->after('payment_code');

            $table->string('payment_type')
                ->nullable()
                ->after('payment_method');

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'order_code',
                'transaction_id',
                'payment_type'
            ]);

        });
    }
};
