@extends('layouts.admin.index')
@section('title', 'Category')


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Product Category list</h4>
            <h6>View/Search product Category</h6>
        </div>
        <div class="page-btn">


            <button type="button" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#newCategory">
                <img src="{{ asset('admin/assets/img/icons/plus.svg') }}" class="me-1" alt="img">Add Category
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
                            <th>STUDENT NAME</th>
                            <th>LESSON NAME</th>
                            <th>DATE CREATED</th>
                            <th>VIEW</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($notes as $key=>$note)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $note->users->name }}</td>
                                <td>{{ $note->lessons->title }}</td>
                                <td>{{ $note->created_at }} </td>
                                <td>
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#showNote-{{ $note->id }}">
                                        <img src="{{ asset('admin/assets/img/icons/eye.svg') }}" alt="View">
                                    </button>
                                    @include('admin.note.show')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Notes found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
