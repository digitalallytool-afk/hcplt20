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
        Schema::create('owner_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('contact_person');
            $table->string('phone_number');
            $table->string('email');
            $table->string('city_state');
            $table->string('profession');
            $table->string('financial_capacity');
            $table->string('preferred_team_name')->nullable();
            $table->string('preferred_district');
            $table->string('prior_experience')->nullable();
            $table->text('reason_to_own');
            $table->text('growth_plan')->nullable();
            $table->text('special_requirements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner_registrations');
    }
};
