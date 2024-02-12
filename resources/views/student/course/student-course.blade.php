@extends('layouts.admin.index')
@section('title', 'My Courses')


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>{{ Auth::user()->name }} Courses list</h4>
            <h6>View/Search my Courses</h6>
        </div>
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="spinner-border spinner-border-sm me-2" role="status"></span> Actions</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('student.course') }}">Other Courses</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('student.dashboard') }}">Home</a>
            </div>
        </div>
    </div>

    <div class="row">
            @forelse ($courses as $course)
               {{--  Card Starts --}}
                    <div class="col-lg-6">
                        <div class="card mb-3">
                            <div class="row g-0">
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <a href="{{ route('course-detail', $course->courses->slug) }}" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ Storage::disk('public')->url('course/'.$course->courses->featured_image) }}"
                                         style="height: 100%!important;" class="card-img img-fluid rounded-start" alt="{{ $course->courses->name }}">
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{ route('course-detail', $course->courses->slug) }}" target="_blank" rel="noopener noreferrer">{{ $course->courses->name }}</a></h5>
                                    <p class="card-text">{{ $course->courses->short_desc }}</p>
                                    {{-- <div class="row">
                                        <div class="col-4"><i class="fa-solid fa-clock fa-spin"></i> {{ $course->duration }} Months</div>
                                        <div class="col-4"><i class="fa-solid fa-list"></i> {{ $course->units->count() }} Units</div>
                                        <div class="col-4"><i class="fa-solid fa-money-bill"></i> Ksh. {{ $course->pricing }}</div>
                                    </div> --}}
                                </div>
                                <div class="text-end m-md-2 m-lg-3">
                                    <div class="row">
                                        <div class="col-8">
                                            <a href="{{ route('course-detail', $course->courses->slug) }}" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye" style="color: #ffffff;"></i>View More</a>
                                        </div>
                                        <div class="col-4">
                                            <button type="button" class="btn btn-primary btn-sm" title="Enrolled on: {{ $course->created_at->toFormattedDateString() }}"><i class="fa-solid fa-graduation-cap fa-beat-fade"></i> Enrolled</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                {{--  Card Ends --}}
            @empty
                    <p class="lead">No Course Available</p>
            @endforelse
    </div>


   <div class="row col-sm-12 text-center">
    {!! $courses->links() !!}
   </div>

</div>


@endsection