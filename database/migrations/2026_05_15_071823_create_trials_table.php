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
        Schema::create('trials', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->id();
            $table->string('zone_name');
            $table->string('title');
            $table->string('venue')->nullable();
            $table->string('date_text')->nullable();
            $table->string('fee')->nullable();
            $table->string('status')->default('Upcoming');
            $table->string('registration_link')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trials');
    }
};
