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
        Schema::create('player_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('age_category')->nullable(); // Under 16, Open Age
            $table->text('address')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            
            // Cricket Info
            $table->string('player_role')->nullable(); // Batsman, Bowler, Wicket Keeper, All Rounder
            $table->string('batting_style')->nullable(); // Right Handed Batsman, Left Handed Batsman
            $table->string('bowler_type')->nullable(); // Left Arm Bowler, Right Arm Bowler
            $table->string('bowling_style')->nullable(); // Slow, Fast
            
            // Trial Location
            $table->string('trial_state')->nullable();
            $table->string('trial_district')->nullable();

            // Payment tracking
            $table->string('payment_status')->default('pending'); // pending, completed
            $table->string('razorpay_order_id')->nullable();
            $table->string('razorpay_payment_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_profiles');
    }
};
