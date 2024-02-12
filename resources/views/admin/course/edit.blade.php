@extends('layouts.admin.index')
@section('title') {{ $course->name }} @endsection

@section('content')

<div class="content">
   <div class="page-header">
      <div class="page-title">
         <h4>Course Management</h4>
         <h6>Update {{ $course->name }} Course</h6>
      </div>
   </div>


    <form action="{{ route('admin.course.update', $course->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
        <!-- First Column -->
            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <!-- Name -->
                            <div class="col-lg-8 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Course  Name</label>
                                    <input type="text" placeholder="CPA Foundational" name="name" required value="{{ $course->name }}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Course Category</label>
                                    <select class="form-select" name="category_id">
                                        <option value="{{ $course->category_id }}" selected>{{ $course->categories->name }}</option>
                                        <option disabled>____________________________</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-6">
                                <div class="form-group">
                                    <label>Course Duration <span class="fst-italic">(Months)</span></label>
                                    <input type="number" name="duration" placeholder="4" required class="form-control" value="{{ $course->duration }}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12 col-6">
                                <div class="form-group">
                                    <label>Course Pricing <span class="fst-italics"> (Ksh.)</span></label>
                                    <div class="pass-group">
                                        <input type="number" class="form-control" name="price" required placeholder="3000" value="{{ $course->pricing }}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row my-2">
                            <div class="col-lg-12 col-sm-12 col-12 my-3">
                                <label class="form-label"> Course Short Description</label>
                                <textarea class="form-control" name="summary" placeholder="Course Short Description" rows="5" maxlength="250">{{ $course->short_desc }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Second Column -->

                <div class="col-md-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <img src="{{ Storage::disk('public')->url('course/'.$course->featured_image) }}" alt="{{ $course->name }}">
                                <div class="form-group">
                                    <label class="form-label">Course Featured Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                                <div class="col-lg-12 text-end">
                                <a href="{{ route('admin.course.index') }}" class="btn btn-cancel">Cancel</a>
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                </div>
                            </div>
                        </div>
                </div>
        </div>


                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <label class="form-label">Course Short Description</label>
                            <textarea name="course_desc" id="desc" class="form-control"  rows="10">{!! $course->desc !!}</textarea>
                        </div>
                    </div>
                </div>
    </form>

</div>


@endsection
