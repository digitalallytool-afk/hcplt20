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
        Schema::create('player_trials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_profile_id')->constrained('player_profiles')->onDelete('cascade');
            $table->foreignId('trial_id')->constrained('trials')->onDelete('cascade');
            $table->string('trial_result')->default('pending')->comment('pending, success, failed');
            $table->date('trial_status_date')->nullable();
            $table->text('trial_remark')->nullable();
            $table->timestamps();

            // Prevent duplicate active trials if necessary, or just index them for speed
            $table->index(['player_profile_id', 'trial_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_trials');
    }
};
