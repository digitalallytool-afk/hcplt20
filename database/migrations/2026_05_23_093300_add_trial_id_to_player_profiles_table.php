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
            $table->unsignedBigInteger('trial_id')->nullable()->after('trial_district');
            
            $table->foreign('trial_id')->references('id')->on('trials')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('player_profiles', function (Blueprint $table) {
            $table->dropForeign(['trial_id']);
            $table->dropColumn('trial_id');
        });
    }
};
