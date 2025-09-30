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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('loan_package_id')->constrained('loan_packages')->cascadeOnDelete();
            $table->foreignId('repayment_type_id')->constrained('repayment_types')->cascadeOnDelete();

            $table->date('pay_schedule')->nullable();
            $table->string('loan_purpose')->nullable();
            $table->decimal('principal_amount', 12, 2);
            $table->decimal('service_fee_amount', 12, 2)->default(0);
            $table->decimal('origination_fee_amount', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2);
            $table->string('frequency')->nullable();
            $table->integer('frequency_in_days')->nullable();

            $table->date('start_date')->nullable();
            $table->date('loan_issue_date')->nullable();
            $table->date('payment_close_date')->nullable();

            $table->boolean('agreed_privacy_policy')->default(false);
            $table->boolean('agreed_terms')->default(false);

            $table->longText('review_note')->nullable();
            $table->json(('income_sources'))->nullable();
            $table->string('repayment_method')->nullable();

            $table->enum('status', ['pending', 'approved', 'rejected', 'completed', 'disbursed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
