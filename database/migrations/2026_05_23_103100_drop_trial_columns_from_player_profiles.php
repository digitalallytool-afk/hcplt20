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
            // Drop foreign key if it exists, wrap in try-catch in case it doesn't
            try {
                $table->dropForeign(['trial_id']);
            } catch (\Exception $e) {
                // do nothing
            }

            if (Schema::hasColumn('player_profiles', 'trial_id')) {
                $table->dropColumn('trial_id');
            }
            if (Schema::hasColumn('player_profiles', 'trial_result')) {
                $table->dropColumn('trial_result');
            }
            if (Schema::hasColumn('player_profiles', 'trial_status_date')) {
                $table->dropColumn('trial_status_date');
            }
            if (Schema::hasColumn('player_profiles', 'trial_remark')) {
                $table->dropColumn('trial_remark');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('player_profiles', function (Blueprint $table) {
            $table->foreignId('trial_id')->nullable()->constrained('trials')->onDelete('set null');
            $table->string('trial_result')->default('pending');
            $table->date('trial_status_date')->nullable();
            $table->text('trial_remark')->nullable();
        });
    }
};
