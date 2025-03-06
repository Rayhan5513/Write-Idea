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
        // Modify the 'role' column to remove the default value
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default(null)->change(); // Remove the default value
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert the 'role' column back to the previous state (with default 'user')
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->change(); // Add default value back if rolled back
        });
    }
};
