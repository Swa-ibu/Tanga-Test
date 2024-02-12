@extends('layouts.admin.index')
@section('title') {{ $course->name }} @endsection


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Student list: {{ $course->name }}</h4>
            <h6>View/Search Student</h6>
        </div>
        <div class="page-btn">


            <a class="btn btn-added" href="{{ route('admin.course.index') }}">
                <img src="{{ asset('frontend/assets/img/back.svg') }}" alt="back"> Back
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
                            <th>Student name</th>
                            <th>Email</th>
                            <th>Progress</th>
                            <th>Enrollment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key=>$user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->users->name }}</td>
                                <td>{{ $user->users->email }}</td>
                                <td>60%</td>
                                <td>{{ $user->created_at->toDayDateTimeString() }}</td>
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

<!-- Modal -->
<div class="modal fade" id="newCategory" aria-labelledby="newCategory" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Create new category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
        <div class="modal-body">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" placeholder="CPA Foundational" name="name" required>
                </div>

                <div class="form-group">
                    <label>Category Icon</label>
                    <input type="text" class="form-control" name="icon" placeholder="<i class='fa-solid fa-book'></i>">
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
