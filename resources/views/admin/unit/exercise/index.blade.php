@extends('layouts.admin.index')
@section('title', 'Unit Exercise')


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Unit Exercise list</h4>
            <h6>View/Search Unit Exercise </h6>
        </div>
        <div class="page-btn">

            @if ($units->count()>0)
                <a href="{{ route('admin.unit-exercise.create') }}" class="btn btn-added">
                    <img src="{{ asset('admin/assets/img/icons/plus.svg') }}" alt="add"> New Unit Exercise
                </a>
            @else
                <button disabled="disabled" class="btn btn-added">
                    <i class="fa-solid fa-circle-check fa-shake" style="color: #ffffff;"></i>  All Exams Set
                </button>
            @endif

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
                            <th>Unit name</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($unitExercises as $key=>$unitExercise)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $unitExercise->units->name }}</td>
                                <td>{{ $unitExercise->users->name }}</td>
                                <td>
                                    <a href="{{ route('admin.unit-exercise.edit', $unitExercise->id) }}"><img src="{{ asset('admin/assets/img/icons/edit.svg') }}" alt="edit exercise"></a>

                                    <a href="{{ route('admin.unit-exercise.show', $unitExercise->id) }}"><img src="{{ asset('admin/assets/img/icons/eye.svg') }}" alt="show exercise"></a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No Exercise founds</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
