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
        Schema::table('owner_registrations', function (Blueprint $table) {
            $table->boolean('declaration_confirmed')->default(false)->after('remarks');
            $table->boolean('declaration_management')->default(false)->after('declaration_confirmed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('owner_registrations', function (Blueprint $table) {
            //
        });
    }
};
