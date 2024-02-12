@extends('layouts.admin.index')
@section('title', 'FAQ')


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>FAQ list</h4>
            <h6>View/Search FAQ</h6>
        </div>
        <div class="page-btn">


            <button type="button" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#faq">
                <img src="{{ asset('admin/assets/img/icons/plus.svg') }}" class="me-1" alt="img">Add FAQ
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
                            <th>FAQ Title</th>
                            <th>Created By</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($faqs as $key=>$faq)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ Str::limit($faq->title, 50, '...') }}</td>
                                <td>{{ $faq->users->name }}</td>
                                <td>{{ $faq->created_at->toDayDateTimeString() }} </td>
                                <td>
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#editFAQ-{{ $faq->id }}">
                                            <img src="{{ asset('admin/assets/img/icons/edit.svg') }}" alt="Edit">
                                        </button>
                                        @include('admin.faq.edit')

                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#showFAQ-{{ $faq->id }}">
                                            <img src="{{ asset('admin/assets/img/icons/eye.svg') }}" alt="View">
                                        </button>
                                        @include('admin.faq.show')

                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deleteFAQ-{{ $faq->id }}">
                                            <img src="{{ asset('admin/assets/img/icons/trash.svg') }}" alt="Delete">
                                        </button>
                                        @include('admin.faq.delete')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No FAQ found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="faq" aria-labelledby="faq" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Create new FAQ</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.faq.store') }}" method="post">
        @csrf
        <div class="modal-body">
                <div class="form-group">
                    <label>FAQ Question</label>
                    <input type="text" class="form-control" placeholder="Question" name="name" required maxlength="255">
                </div>

                <div class="form-group">
                    <label>FAQ Answer</label>
                    <textarea name="answer" class="form-control" rows="10"></textarea>
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
