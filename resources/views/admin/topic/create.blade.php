@extends('layouts.admin.index')
@section('title', 'New Topic')

@section('content')

<div class="content">
   <div class="page-header">
      <div class="page-title">
         <h4>Topic Management</h4>
         <h6>Add/Update Topic</h6>
      </div>
      <div class="page-btn me-lg-5">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="spinner-border spinner-border-sm me-2" role="status"></span> Actions</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('admin.topic.index') }}">Back</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Home</a>
            </div>
        </div>
    </div>
   </div>


    <form action="{{ route('admin.topic.store') }}" method="post">
        @csrf
        <!-- First Column -->
        <div class="row">
            <div class="col-md-11 col-lg-11 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row my-4">
                            <!-- Name -->
                            <div class="col-lg-5 col-sm-12 col-5">
                                <div class="form-group">
                                    <label>Topic Name</label>
                                    <input type="text" placeholder="Introduction to Financial Analysis" name="name" required>
                                </div>
                            </div>

                            <div class="col-lg-2 col-2"></div>

                            <div class="col-lg-5 col-sm-6 col-5">
                                <div class="form-group">
                                    <label>Unit (s)</label>
                                    <select class="form-select select2-single" name="unit_id">
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Topic Introduction / Objectives</label>
                            <textarea name="objectives" id="desc" class="form-control"  rows="10"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-start">
                                <a href="{{ route('admin.topic.index') }}" class="btn btn-cancel">Cancel</a>
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection
