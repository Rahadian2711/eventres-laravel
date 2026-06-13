<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('biller_code')->nullable()->after('payment_code');
            $table->string('bill_key')->nullable()->after('biller_code');
            $table->text('deeplink_url')->nullable()->after('qr_url');
            $table->timestamp('payment_expired_at')->nullable()->after('expired_at');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['biller_code', 'bill_key', 'deeplink_url', 'payment_expired_at']);
        });
    }
};