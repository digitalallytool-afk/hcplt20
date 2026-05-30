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
            $table->string('player_id')->nullable()->unique()->after('id');
            $table->string('phone_number')->nullable()->after('age_category');
            $table->string('alternate_phone_number')->nullable()->after('phone_number');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('player_profiles', function (Blueprint $table) {
            $table->dropColumn(['player_id', 'phone_number', 'alternate_phone_number']);
        });
    }
};
