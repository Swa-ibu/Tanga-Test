@extends('layouts.admin.index')
@section('title', 'Home')


@section('content')


<div class="content">
    {{-- Top row Starts --}}
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count">
                <div class="dash-counts">
                    <h4>{{ count($stdCourses) }}</h4>
                    <h5>My Courses</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="user"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das1">
                <div class="dash-counts">
                    <h4>{{ $stdCourses->count() }}</h4>
                    <h5>Units To be Covered</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="user-check"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das2">
                <div class="dash-counts">
                    <h4>{{ $enrollDate->created_at->diffForHumans() }}</h4>
                    <h5>Days Learnt</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="file-text"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 d-flex">
            <div class="dash-count das3">
                <div class="dash-counts">
                    <h4>{{ $courses->count() }}</h4>
                    <h5>All Courses</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="file"></i>
                </div>
            </div>
        </div>
    </div>
    {{-- Top row Ends --}}

    {{-- Resume Learning --}}
            <div class="row my-md-2 my-lg-4">
                @forelse ($lastAccessedLesssons as $lastLesson)
                    {{--  Card Starts --}}
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="row g-0">
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <a href="{{ route('student.resume-learning-lesson', $lastLesson->lessons->slug) }}" target="_blank" rel="noopener noreferrer">
                                        {{-- <img src="{{ Storage::disk('public')->url('course/'.$lastLesson->topics->units->courses->featured_image) }}" style="height: 100%!important;" class="card-img img-fluid rounded-start" alt="{{ $lastLesson->lessons->title }}"> --}}
                                        <img src="{{ asset('admin/assets/img/lsn.png') }}" style="height: 100%!important;" class="card-img img-fluid rounded-start" alt="{{ $lastLesson->lessons->title }}">
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{ route('student.resume-learning-lesson', $lastLesson->lessons->slug) }}" target="_blank" rel="noopener noreferrer">{{ $lastLesson->lessons->title }}</a></h5>
                                        <p class="card-text">{!! Str::limit($lastLesson->topics->desc, 100, '...') !!}</p>
                                        {{-- <div class="row">
                                            <div class="col-4"><i class="fa-solid fa-clock fa-spin"></i> {{ $course->duration }} Months</div>
                                            <div class="col-4"><i class="fa-solid fa-list"></i> {{ $course->units->count() }} Units</div>
                                            <div class="col-4"><i class="fa-solid fa-money-bill"></i> Ksh. {{ $course->pricing }}</div>
                                        </div> --}}
                                    </div>
                                    <div class="text-end m-md-2 m-lg-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="{{ route('student.resume-learning-lesson', $lastLesson->lessons->slug) }}" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-eye" style="color: #ffffff;"></i>Resume Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    {{--  Card Ends --}}
                @empty
                        <p class="lead">No session found</p>
                @endforelse
        </div>
    {{-- Resume Learning --}}

    <div class="row">
        <div class="col-lg-7 col-sm-12 col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">My Courses</h5>
                </div>
                <div class="card-body">
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
                                        <th>Intructor</th>
                                        <th># Units</th>
                                    </tr>
                                </thead>
                               <tbody>
                                @forelse ($stdCourses as $key=>$stdCourse)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $stdCourse->courses->name }}</td>
                                        <td>{{ $stdCourse->courses->users->name }}</td>
                                        <td>
                                            <ul class="list-group list-group-flush">
                                                @forelse ($stdCourse->courses->units as $unit)
                                                    <li class="list-group-item">{{ $unit->name }} <a class="btn btn-sm btn-primary float-end" href="{{ route('student.resume-learning-unit', $unit->slug) }}">Resume</a></li>
                                                @empty
                                                    <li class="list-group-item">No unit found</li>
                                                @endforelse
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4">You have not registred for a course yet. </td></tr>
                                @endforelse
                               </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-lg-5 col-sm-12 col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Related Courses</h4>
                    <div class="dropdown">
                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
                            <i class="fa fa-ellipsis-v"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a href="{{ route('course') }}" target="_blank" class="dropdown-item">Course List</a>
                            </li>
                            <li>
                                <a href="{{ route('student.course') }}" class="dropdown-item">Enroll</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dataview">
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Course Name</th>
                                    <th>Cost</th>
                                    <th>Instructor</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $key=>$course)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <a href="{{ route('course-detail', $course->slug) }}" target="_blank">{{ $course->name }}</a>
                                        </td>
                                        <td>Ksh. {{ $course->pricing }}</td>
                                        <td>{{ $course->users->name }}</td>
                                        <td>{{ $course->duration }} Months</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No related course</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title">Learning Logs</h4>
            <div class="table-responsive dataview">
                <table class="table datatable ">
                    <thead>
                        <tr>
                            <th>SNo</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Brand Name</th>
                            <th>Category Name</th>
                            <th>Expiry Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <a href="javascript:void(0);">IT0001</a>
                            </td>
                            <td class="productimgname">
                                <a class="product-img" href="productlist.html">
                                    <img src="assets/img/product/product2.jpg" alt="product">
                                </a>
                                <a href="productlist.html">Orange</a>
                            </td>
                            <td>N/D</td>
                            <td>Fruits</td>
                            <td>12-12-2022</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <a href="javascript:void(0);">IT0002</a>
                            </td>
                            <td class="productimgname">
                                <a class="product-img" href="productlist.html">
                                    <img src="assets/img/product/product3.jpg" alt="product">
                                </a>
                                <a href="productlist.html">Pineapple</a>
                            </td>
                            <td>N/D</td>
                            <td>Fruits</td>
                            <td>25-11-2022</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                <a href="javascript:void(0);">IT0003</a>
                            </td>
                            <td class="productimgname">
                                <a class="product-img" href="productlist.html">
                                    <img src="assets/img/product/product4.jpg" alt="product">
                                </a>
                                <a href="productlist.html">Stawberry</a>
                            </td>
                            <td>N/D</td>
                            <td>Fruits</td>
                            <td>19-11-2022</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>
                                <a href="javascript:void(0);">IT0004</a>
                            </td>
                            <td class="productimgname">
                                <a class="product-img" href="productlist.html">
                                    <img src="assets/img/product/product5.jpg" alt="product">
                                </a>
                                <a href="productlist.html">Avocat</a>
                            </td>
                            <td>N/D</td>
                            <td>Fruits</td>
                            <td>20-11-2022</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
</div>

@endsection
