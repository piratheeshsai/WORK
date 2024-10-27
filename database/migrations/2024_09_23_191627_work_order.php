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
        Schema::create('work_order', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('work_type');
            $table->string('priority');
            $table->string('complain');
            $table->string('status')->default('Pending');
            $table->integer('progress')->default(25);
            $table->string('EmployeeId');
            $table->timestamps();
            // Foreign key relationship
            $table->foreign('EmployeeId')->references('EmployeeId')->on('user_details')->onDelete('cascade');
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
