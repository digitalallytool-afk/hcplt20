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
        Schema::table('player_profiles', function (Blueprint $table) {
            $table->decimal('payment_amount', 10, 2)->nullable()->after('razorpay_payment_id');
            $table->timestamp('payment_date')->nullable()->after('payment_amount');
            $table->json('payment_response')->nullable()->after('payment_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('player_profiles', function (Blueprint $table) {
            $table->dropColumn(['payment_amount', 'payment_date', 'payment_response']);
        });
    }
};
