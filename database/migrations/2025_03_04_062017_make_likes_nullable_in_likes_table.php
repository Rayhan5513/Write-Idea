<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('likes', function (Blueprint $table) {
        $table->integer('likes')->nullable()->change();  // Make the 'likes' column nullable
    });
}

public function down()
{
    Schema::table('likes', function (Blueprint $table) {
        $table->integer('likes')->nullable(false)->change();  // Revert it back to not nullable
    });
}
 
};
