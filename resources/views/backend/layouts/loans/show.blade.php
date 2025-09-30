@extends('backend.app')
@section('title', 'Loan Details')

@section('content')
<div class="main-content-container overflow-hidden">
    <h3 class="mb-4">Loan Details</h3>

    {{-- Loan & User Overview --}}
    <div class="row g-4 mb-4">
        {{-- Loan Package --}}
        <div class="col-md-6">
            <div class="card bg-white border-0 shadow-sm rounded-3 h-100">
                <div class="card-body p-4">
                    <h5 class="mb-3"><i class="bi bi-box-seam me-2"></i> Loan Package</h5>
                    <p><strong>Name:</strong> {{ $data->loanPackage['name'] ?? 'N/A' }}</p>
                    <p><strong>Amount:</strong> {{ $data->loanPackage['amount'] ?? 'N/A' }}</p>
                    <p><strong>Descriptions:</strong><br>{!! nl2br($data->loanPackage['descriptions']?? 'N/A') !!}</p>                    
                </div>
            </div>
        </div>

        {{-- User Information --}}
        <div class="col-md-6">
            <div class="card bg-white border-0 shadow-sm rounded-3 h-100">
                <div class="card-body p-4">
                    <h5 class="mb-3"><i class="bi bi-person-circle me-2"></i> User Information</h5>
                    <p><strong>Name:</strong> {{ $data->user->name ?? '—' }}</p>
                    <p><strong>Email:</strong> {{ $data->user->email ?? '—' }}</p>
                    <p><strong>Phone:</strong> {{ $data->user->phone ?? '—' }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Loan Overview --}}
    <div class="card bg-white border-0 shadow-sm rounded-3 mb-4">
        <div class="card-body p-4">
            <h5 class="mb-3"><i class="bi bi-cash-coin me-2"></i> Loan Overview</h5>
            <div class="row g-3">
                <div class="col-md-3"><strong>Principal:</strong> ${{ $data->principal_amount }}</div>
                <div class="col-md-3"><strong>Origination Fee:</strong> ${{ $data->origination_fee_amount }}</div>
                <div class="col-md-3"><strong>Service Fee:</strong> ${{ $data->service_fee_amount }}</div>
                <div class="col-md-3"><strong>Total Repay:</strong> ${{ $data->total_amount }}</div>
                <div class="col-md-3">
                    <strong>Status:</strong>
                    <span class="badge bg-{{ 
                        $data->status == 'pending' ? 'warning' : 
                        ($data->status == 'approved' ? 'primary' : 
                        ($data->status == 'rejected' ? 'danger' : 
                        ($data->status == 'completed' ? 'success' : 'info'))) }}">
                        {{ ucfirst($data->status) }}
                    </span>
                </div>
                <div class="col-md-3"><strong>Issued At:</strong> {{ $data->loan_issue_date ?? '—' }}</div>
                <div class="col-md-3"><strong>Closed At:</strong> {{ $data->payment_close_date ?? '—' }}</div>
                <div class="col-md-3"><strong>Terms & Conditions:</strong> {{ $data->agreed_terms ? 'Agreed' : 'Not Agreed' }}</div>
                <div class="col-md-3"><strong>Review Note:</strong> {{ $data->review_note ?? '—' }}</div>
                <div class="col-md-3"><strong>Frequency:</strong> {{ ucfirst($data->frequency) }}</div>
                <div class="col-md-3"><strong>Purpose:</strong> {{ $data->loan_purpose ?? '—' }}</div>
                
            </div>
        </div>
    </div>

    {{-- Applicants --}}
    <div class="card bg-white border-0 shadow-sm rounded-3 mb-4">
        <div class="card-body p-4">
            <h5 class="mb-3"><i class="bi bi-people me-2"></i> Applicant Information</h5>
            <div class="row">
                @foreach ($data->applicantInformations as $applicant)
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 mb-3">
                            <h6 class="mb-2 text-primary">{{ ucfirst($applicant['information_type']) }} Information</h6>
                            <p><strong>Name:</strong> {{ $applicant['first_name'] }} {{ $applicant['last_name'] }}</p>
                            <p><strong>Email:</strong> {{ $applicant['email'] }}</p>
                            <p><strong>Phone:</strong> {{ $applicant['phone'] }}</p>
                            <p><strong>Address:</strong> {{ $applicant['street_address'] }}, {{ $applicant['city'] }}, {{ $applicant['state'] }} {{ $applicant['zip'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Documents --}}
    <div class="card bg-white border-0 shadow-sm rounded-3 mb-4">
        <div class="card-body p-4">
            <h5 class="mb-3"><i class="bi bi-file-earmark-text me-2"></i> Documents</h5>
            @if (count($data->loanDocuments))
                <ul class="list-group">
                    @foreach ($data->loanDocuments as $doc)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{ $doc['title'] ?? 'Document' }}</span>
                            <div>
                                <span class="badge bg-{{ 
                                    $doc['status'] == 'pending' ? 'warning' : 
                                    ($doc['status'] == 'approved' ? 'success' : 'danger') }}">
                                    {{ ucfirst($doc['status']) }}
                                </span>
                                <a href="{{ asset($doc['file_path']) }}" target="_blank" class="btn btn-sm btn-outline-primary ms-2">
                                    <i class="bi bi-eye"></i> View
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No documents uploaded.</p>
            @endif
        </div>
    </div>

    {{-- Repayment Schedule --}}
    <div class="card bg-white border-0 shadow-sm rounded-3 mb-4">
        <div class="card-body p-4">
            <h5 class="mb-3"><i class="bi bi-calendar-check me-2"></i> Repayment Schedule</h5>
            @if (count($data->loanRepaymentSchedules))
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Due Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->loanRepaymentSchedules as $key => $schedule)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $schedule['due_date'] }}</td>
                                    <td>${{ $schedule['amount'] }}</td>
                                    <td>
                                        <span class="badge bg-{{ 
                                            $schedule['status'] == 'paid' ? 'success' : 
                                            ($schedule['status'] == 'pending' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($schedule['status']) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted">Repayment schedule will be generated after loan approval.</p>
            @endif
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('loans.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
    </div>
</div>
@endsection
