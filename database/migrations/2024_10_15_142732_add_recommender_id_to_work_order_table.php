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
    Schema::table('work_order', function (Blueprint $table) {
        $table->string('recommender_id')->nullable(); // Add recommender_id column
        $table->foreign('recommender_id')->references('userID')->on('users')->onDelete('set null'); // Foreign key constraint
    });
}

public function down(): void
{
    Schema::table('work_order', function (Blueprint $table) {
        $table->dropForeign(['recommender_id']);
        $table->dropColumn('recommender_id');
    });
}

};
