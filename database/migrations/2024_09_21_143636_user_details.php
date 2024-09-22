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
        Schema::create('user_details', function (Blueprint $table) {
            $table->string('EmployeeId')->primary();
            $table->string('userID');  // Foreign key to users table
            $table->string('full_name');
            $table->string('section');
            $table->string('subsection');
            $table->string('department'); 
            $table->string('PhoneNumber');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); // Store email in this table
            $table->timestamps();
            // Foreign key relationship
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
