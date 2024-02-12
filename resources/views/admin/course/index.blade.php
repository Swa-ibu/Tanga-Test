@extends('layouts.admin.index')
@section('title', 'Courses')


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Course list</h4>
            <h6>View/Search Course</h6>
        </div>
        <div class="page-btn">


            <a href="{{ route('admin.course.create') }}" class="btn btn-added">
                <img src="assets/img/icons/plus.svg" alt="img" class="me-1">Add New Course </a>


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
                            <th>Course Name</th>
                            <th>Category </th>
                            <th>Duration</th>
                            <th>Price</th>
                            <th>View Count</th>
                            <th>Units</th>
                            <th>Status</th>
                            <th>Students</th>
                            <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $key=>$course)
                           <tr>
                              <td>{{ $key + 1 }} </td>
                              <td>{{ $course->name }} </td>
                              <td>{{ $course->categories->name }} </td>
                              <td>{{ $course->duration }} Months</td>
                              <td>Ksh. {{ $course->pricing }} </td>
                              <td>{{ $course->view_count }} Views</td>
                              <td>{{ $course->units->count() }} Units</td>
                              <td>
                                 <div class="status-toggle d-flex justify-content-between align-items-center">
                                    <input type="checkbox" id="user1" class="check" {{  $course->status? 'checked' : ''  }} @disabled(true)>
                                    <label for="user1" class="checktoggle">{{ $course->status? 'Active' : 'Inactive' }}</label>
                                 </div>
                              </td>
                              <td>
                                <a href="{{ route('admin.course.show', $course->id) }}"><img src="{{ asset('admin/assets/img/icons/users.svg') }}" alt="show course"></a>
                                <a href="{{ route('admin.course.course-payments', $course->slug) }}"><img src="{{ asset('admin/assets/img/icons/dollar-sign.svg') }}" alt="show course payments"></a>
                              </td>
                              <td>
                                 <a href="{{ route('admin.course.edit', $course->id) }}"><img src="{{ asset('admin/assets/img/icons/edit.svg') }}" alt="edit course"></a>

                                 {{-- Approve course --}}
                                 <a type="button" data-bs-toggle="modal" data-bs-target="#approveCourse-{{ $course->id }}">
                                    @if ($course->status)
                                        <img src="{{ asset('admin/assets/img/icons/sun.svg') }}" alt="Active">
                                    @else
                                        <img src="{{ asset('admin/assets/img/icons/moon.svg') }}" alt="Inactive">
                                    @endif
                                </a>
                                @include('admin.course.approve')
                                <a target="_blank" href="{{ route('course-detail', $course->slug) }}"><img src="{{ asset('admin/assets/img/icons/external-link.svg') }}" alt="show course"></a>
                              </td>
                           </tr>
                        @empty
                           <tr>
                              <td colspan="7"> <span class="text-center">No Course Available</span></td>
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
