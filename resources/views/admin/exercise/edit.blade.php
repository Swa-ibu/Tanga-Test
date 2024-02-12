@extends('layouts.admin.index')
@section('title', 'Edit Exercise')

@section('content')

<div class="content">
   <div class="page-header">
      <div class="page-title">
         <h4>Exercise Management</h4>
         <h6>Add/Update Lesson Exercises</h6>
      </div>
      <div class="page-btn me-lg-5">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="spinner-border spinner-border-sm me-2" role="status"></span> Actions</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('admin.exercise') }}">Back</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Home</a>
            </div>
        </div>
    </div>
   </div>


    <form action="{{ route('admin.exercise.update', $exercise->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
        <!-- First Column -->
            <div class="col-md-12 col-lg-11 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-3">
                            <!-- Name -->
                            <div class="col-lg-5 col-sm-12">
                                <div class="form-group">
                                    <label>Exercise Title</label>
                                    <input type="text" placeholder="Financial Analysis Exercise" name="name" required value="{{ $exercise->title }}">
                                </div>
                            </div>

                            <div class="col-lg-7 col-sm-12">
                                <div class="form-group">
                                    <label>Lessons</label>
                                    <select class="form-select select2-multiple" name="lessons[]" multiple>
                                        <option disabled>--Select Lesson--</option>
                                        @foreach ($lessons as $lesson)
                                            <option
                                                @foreach ($exercise->lessons as $exerLessons)
                                                    {{ $exerLessons->id == $lesson->id ? 'selected': '' }}
                                                @endforeach

                                            value="{{ $lesson->id }}">{{ $lesson->title }} @ {{ $lesson->topics->units->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 my-3">
                                <label class="form-label">Exercise Content</label>
                                <textarea class="form-control" name="content" placeholder="Exercise" id="desc" rows="7">{!! $exercise->desc !!}</textarea>
                            </div>
                        </div>
                        <div class="row text-end">
                            <div class="col-lg-12">
                            <a href="{{ route('admin.unit.index') }}" class="btn btn-cancel">Cancel</a>
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>

</div>


@endsection
