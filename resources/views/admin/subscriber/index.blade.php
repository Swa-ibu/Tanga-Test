@extends('layouts.admin.index')
@section('title', 'Subscribers')


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Subscribers list</h4>
            <h6>View/Search Subscribers</h6>
        </div>
        <div class="page-btn">


            <button type="button" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#newCategory" disabled>
                <img src="{{ asset('admin/assets/img/icons/plus.svg') }}" class="me-1" alt="img">Add Subscribers
            </button>


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
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>SUBSCRIPTION DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subscribers as $key=>$subscriber)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if (empty($subscriber->name))
                                        ---
                                    @else
                                        {{ $subscriber->name }}
                                    @endif
                                </td>
                                <td>{{ $subscriber->email }}</td>
                                <td>{{ $subscriber->created_at->toDayDateTimeString() }} </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No Subscriber found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
