<?php

namespace App\Services\API\V1\User;

use App\Models\Loan;
use App\Models\LoanRepaymentSchedule;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardService
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function dashboardData()
    {
        try {
            $userId = $this->user->id;
            $data = [];

            // all loan query IDs
            $userLoans = Loan::where('user_id', $userId)->get(['id', 'loan_purpose', 'total_amount', 'created_at', 'status', 'loan_issue_date', 'payment_close_date']);
            $loanIds = $userLoans->pluck('id')->toArray();

            // ===================== Total Loan Card =====================
            $totalLoanBalance = $userLoans
                ->whereIn('status', ['repayment', 'disbursed', 'overdue', 'completed'])
                ->sum('total_amount');

            $differenceOnLastMonthPercentage = $this->getLoanDifferencePercentage($userId);

            $totalLoanCard = [
                'total_loan_balance' => $totalLoanBalance ?? 0,
                'difference_on_last_month_percentage' => $differenceOnLastMonthPercentage ?? 0,
            ];

            // ===================== Upcoming Repayment Card =====================
            $upcomingRepayment = LoanRepaymentSchedule::with('loan:id,loan_purpose')
                ->whereIn('loan_id', $loanIds)
                ->whereIn('status', ['pending', 'rescheduled'])
                ->orderBy('due_date', 'asc')
                ->select('id', 'due_date', 'loan_id')
                ->first();

            $thisMonthTotalRepaymentAmount = LoanRepaymentSchedule::whereIn('loan_id', $loanIds)
                ->where('status', 'pending')
                ->whereYear('due_date', Carbon::now()->year)
                ->whereMonth('due_date', Carbon::now()->month)
                ->sum('amount');

            $repaymentScheduleCard = [
                'loan_purpose' => $upcomingRepayment?->loan?->loan_purpose,
                'upcoming_repayment' => $upcomingRepayment,
                'this_month_total_repayment_amount' => $thisMonthTotalRepaymentAmount ?? 0,
            ];

            // ===================== Payment Due Date Card =====================
            $lastOverdue = LoanRepaymentSchedule::with('loan:id,loan_purpose')
                ->whereIn('loan_id', $loanIds)
                ->where('status', 'overdue')
                ->orderBy('due_date', 'asc')
                ->select('id', 'due_date', 'loan_id')
                ->first();

            $totalOverdueAmount = LoanRepaymentSchedule::whereIn('loan_id', $loanIds)
                ->where('status', 'overdue')
                ->sum('amount');

            $paymentDueDateCard = [
                'loan_purpose' => $lastOverdue?->loan?->loan_purpose,
                'last_overdue_date' => $lastOverdue,
                'total_overdue_amount' => $totalOverdueAmount ?? 0,
            ];

            // ===================== Upcoming Repayment Dates Card =====================
            $upcomingRepaymentDates = LoanRepaymentSchedule::with('loan:id,loan_purpose')
                ->whereIn('loan_id', $loanIds)
                ->whereIn('status', ['pending', 'rescheduled'])
                ->orderBy('due_date', 'asc')
                ->select('id', 'amount', 'due_date', 'loan_id')
                ->get();

            // ===================== Past Loans History =====================
            $pastLoans = $userLoans->where('status', 'completed');

            // ===================== Final Data Response =====================
            $data = [
                'total_loan_card' => $totalLoanCard,
                'repayment_schedule_card' => $repaymentScheduleCard,
                'payment_due_date_card' => $paymentDueDateCard,
                'loan_status_card' => $userLoans,
                'upcoming_dates_card' => $upcomingRepaymentDates,
                'history_of_past_loans_and_payments_card' => $pastLoans,
            ];

            return $data;

        } catch (\Exception $e) {
            Log::error('DashboardService::dashboardData - '.$e->getMessage());
            throw $e;
        }
    }

    /**
     * Calculate percentage difference between current and last month loan balance
     */
    private function getLoanDifferencePercentage($userId)
    {
        $now = Carbon::now();

        // Current month balance
        $currentBalance = Loan::where('user_id', $userId)
            ->whereIn('status', ['repayment', 'disbursed', 'overdue', 'completed'])
            ->whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->sum('total_amount');

        // Last month balance
        $lastMonth = $now->copy()->subMonth();
        $lastBalance = Loan::where('user_id', $userId)
            ->whereIn('status', ['repayment', 'disbursed', 'overdue', 'completed'])
            ->whereYear('created_at', $lastMonth->year)
            ->whereMonth('created_at', $lastMonth->month)
            ->sum('total_amount');

        // Calculate percentage safely
        return $lastBalance > 0
            ? (($currentBalance - $lastBalance) / $lastBalance) * 100
            : 0;
    }

    public function HistoryPageData($request)
    {
        try {
            $per_page = $request->per_page ?? 25;
            $loans = Loan::where('user_id', $this->user->id)
            ->select('id', 'loan_purpose', 'total_amount', 'created_at', 'status', 'loan_issue_date', 'payment_close_date')
            ->paginate($per_page);
            return $loans;
        } catch (Exception $e) {
            Log::error('DashboardService::HistoryPageData - '.$e->getMessage());
            throw $e;
        }
    }
}
