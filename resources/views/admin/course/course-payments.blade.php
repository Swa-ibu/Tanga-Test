@extends('layouts.admin.index')
@section('title') {{ $course->name }} @endsection


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Payment towards: {{ $course->name }}</h4>
            <h6>View/Search Payments</h6>
        </div>
        <div class="page-btn me-lg-5">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="spinner-border spinner-border-sm me-2" role="status"></span> Actions</button>
                <div class="dropdown-menu">
                    @forelse ($courses as $course)
                        <a class="dropdown-item" href="{{ route('admin.course.course-payments', $course->slug) }}">{{ $course->name }}</a>
                    @empty
                        <a class="dropdown-item" href="{{ route('admin.course.index') }}">Back</a>
                    @endforelse
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('admin.course.index') }}">Back</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Home</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-top">
                <div class="search-set">
                    <div class="search-path">
                        <a class="btn btn-filter" id="filter_search">
                            <img src="{{ asset('admin/assets/img/icons/filter.svg')  }}" alt="img">
                            <span>
                                <img src="{{ asset('admin/assets/img/icons/closes.svg')  }}" alt="img">
                            </span>
                        </a>
                    </div>
                    <div class="search-input">
                        <a class="btn btn-searchset">
                            <img src="{{ asset('admin/assets/img/icons/search-white.svg')  }}" alt="img">
                        </a>
                    </div>
                </div>
                <div class="wordset">
                    <ul>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf">
                                <img src="{{ asset('admin/assets/img/icons/pdf.svg') }}" alt="{{ config('app.name') }}">
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel">
                                <img src="{{ asset('admin/assets/img/icons/excel.svg') }}" alt="{{ config('app.name') }}">
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print">
                                <img src="{{ asset('admin/assets/img/icons/printer.svg') }}" alt="{{ config('app.name') }}">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table  datanew">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student name</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Ref. Code</th>
                            <th>Enrollment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($coursePayments as $key=>$payment)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $payment->users->name }}</td>
                                <td>{{ $payment->users->email }}</td>
                                <td>Ksh. {{ $payment->amount_paid }}</td>
                                <td>{{ $payment->mpesa_receipt_no }}</td>
                                <td>{{ $payment->created_at->toDayDateTimeString() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No student found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
