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
                            <th>Category name</th>
                            <th>Category Icon</th>
                            <th>Courses</th>
                            <th>Created By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $key=>$category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{!! $category->icon !!}  </td>
                                <td>{{ $category->courses->count() }}</td>
                                <td>{{ $category->users->name }} </td>
                                <td>
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editCategory-{{ $category->id }}">
                                            <img src="{{ asset('admin/assets/img/icons/edit.svg') }}" alt="Edit">
                                        </button>
                                        @include('admin.category.edit')

                                        <!-- <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deleteCategory-{{ $category->id }}">
                                            <img src="{{ asset('admin/assets/img/icons/trash.svg') }}" alt="Delete">
                                        </button> -->
                                </td>
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
