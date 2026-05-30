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
        Schema::table('web_settings', function (Blueprint $table) {
            $table->integer('registration_actual_price')->default(2999)->after('about_us_summary');
            $table->integer('registration_discounted_price')->default(1499)->after('registration_actual_price');
            $table->integer('registration_max_discount_players')->default(3000)->after('registration_discounted_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('web_settings', function (Blueprint $table) {
            $table->dropColumn([
                'registration_actual_price',
                'registration_discounted_price',
                'registration_max_discount_players'
            ]);
        });
    }
};
