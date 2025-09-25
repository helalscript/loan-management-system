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
        Schema::create('income_sources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained('loans')->cascadeOnDelete();
            $table->enum('type', ['Employed', 'Business', 'Other']);
            $table->string('sub_type')->nullable(); // e.g., Salary, Freelance
            $table->string('job_title')->nullable();
            $table->unsignedTinyInteger('start_month')->nullable(); // 1-12
            $table->unsignedSmallInteger('start_year')->nullable();
            $table->decimal('annual_income', 12, 2)->nullable();
            $table->decimal('additional_compensation', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_sources');
    }
};
