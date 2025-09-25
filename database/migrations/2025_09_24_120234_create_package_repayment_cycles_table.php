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
        Schema::create('package_repayment_cycles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_package_id')->constrained('loan_packages')->cascadeOnDelete();
            $table->foreignId('repayment_type_id')->constrained('repayment_types')->cascadeOnDelete();
            $table->unsignedInteger('installment_no');
            $table->decimal('installment_amount', 12, 2);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_repayment_cycles');
    }
};
