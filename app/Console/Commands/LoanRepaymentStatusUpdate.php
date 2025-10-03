<?php

namespace App\Console\Commands;

use App\Models\LoanRepaymentSchedule;
use Illuminate\Console\Command;

class LoanRepaymentStatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:loan-repayment-status-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        LoanRepaymentSchedule::whereIn('status', ['pending', 'rescheduled'])
            ->where('due_date', '<', now())
            ->update(['status' => 'overdue']);
        $this->info('Loan repayment status updated.');
    }
}
