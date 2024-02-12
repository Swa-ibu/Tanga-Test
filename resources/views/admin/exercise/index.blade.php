@extends('layouts.admin.index')
@section('title', 'Exercises')


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Lesson Exercises list</h4>
            <h6>View/Search Lesson Exercises</h6>
        </div>
        <div class="page-btn me-lg-5">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="spinner-border spinner-border-sm me-2" role="status"></span> Actions</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('admin.exercise.create') }}">New Lesson Exercise</a>
                    <a class="dropdown-item" href="{{ route('admin.exercise') }}">Back</a>
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
                            <th>Exercise Title</th>
                            <th>Status</th>
                            <th>Lessons Attached</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($exercises as $key=>$exercise)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $exercise->title }}</td>
                                <td>{{ $exercise->status? 'Active' : 'Inactive' }}  </td>
                                <td>{{ $exercise->lessons->count() }}</td>
                                <td>{{ $exercise->users->name }} </td>
                                <td>
                                        <a href="{{ route('admin.exercise.edit', $exercise->id) }}" class="btn">
                                            <img src="{{ asset('admin/assets/img/icons/edit.svg') }}" alt="Edit">
                                        </a>

                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#showLessonExercise-{{ $exercise->id }}">
                                            <img src="{{ asset('admin/assets/img/icons/eye.svg') }}" alt="Delete">
                                        </button>
                                        @include('admin.exercise.show')


                                        <a class="btn" href="{{ route('admin.exercise.edit', $exercise->id) }}">
                                            <img src="{{ asset('admin/assets/img/icons/link.svg') }}" alt="Attach">
                                        </a>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Exercise found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newLessonExcerise" aria-labelledby="newLessonExcerise" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Create new Exercise</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.exercise.store') }}" method="post">
        @csrf
        <div class="modal-body">
                <div class="form-group">
                    <label>Exercise Title</label>
                    <input type="text" class="form-control" placeholder="CPA Foundational Exercise" name="name" required>
                </div>

                <div class="form-group">
                    <label>Exercise Content</label>
                    <textarea name="content" id="desc" class="form-control" rows="10"></textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button btn-sm" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit btn-sm" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
