@extends('layouts.admin.index')
@section('title', 'Questions')


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Questions list</h4>
            <h6>View/Search Questions</h6>
        </div>
        <div class="page-btn">


            <a href="{{ route('student.dashboard') }}" class="btn btn-added"><img src="{{ asset('frontend/assets/img/back.svg') }}" alt="back">  Home</a>


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
                            <th>ASKED BY</th>
                            <th>QUESTION</th>
                            <th>TOPIC</th>
                            <th>STATUS</th>
                            <th>ANSWERED BY</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            @forelse ($questions as $key=>$question)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $question->users->name }} </td>
                                    <td>{{ Str::limit($question->question, 30, '...') }}</td>
                                    <td>{{ $question->topics->name }}</td>
                                    <td>
                                        <div class="status-toggle d-flex justify-content-between align-items-center">
                                            <input type="checkbox" id="user1" class="check" {{  $question->status? 'checked' : ''  }} @disabled(true)>
                                            <label for="user1" class="checktoggle">{{ $question->status? 'Answered' : 'Not Answered' }}</label>
                                         </div>
                                    </td>
                                    <td>{{ $question->status? 'Answered' : 'Not Answered' }}</td>
                                    <td>
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#showQuestion-{{ $question->id }}">
                                            <img src="{{ asset('admin/assets/img/icons/eye.svg') }}" alt="View">
                                          </a>
                                          @include('student.question.show')
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
