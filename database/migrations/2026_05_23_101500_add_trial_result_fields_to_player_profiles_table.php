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
            $table->string('trial_result')->default('pending')->after('trial_id')->comment('pending, success, failed');
            $table->date('trial_status_date')->nullable()->after('trial_result');
            $table->text('trial_remark')->nullable()->after('trial_status_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('player_profiles', function (Blueprint $table) {
            $table->dropColumn(['trial_result', 'trial_status_date', 'trial_remark']);
        });
    }
};
