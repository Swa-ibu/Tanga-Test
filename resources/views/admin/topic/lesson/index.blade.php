@extends('layouts.admin.index')
@section('title', 'Lessons')


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Lessons list</h4>
            <h6>View/Search Lessons</h6>
        </div>
        <div class="page-btn">


            <a href="{{ route('admin.topic.index') }}" class="btn btn-added">
                <img src="{{ asset('admin/assets/img/icons/plus.svg') }}" class="me-1" alt="img">New Lesson
            </a>


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
                            <th>Lesson name</th>
                            <th>Topic/Unit</th>
                            <th>Views</th>
                            <th>Created By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lessons as $key=>$lesson)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->topics->name }}, {{ $lesson->topics->units->name }}</td>
                                <td>{{ $lesson->view_count }} Views</td>
                                <td>{{ $lesson->users->name }} </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Category found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
