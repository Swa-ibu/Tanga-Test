@extends('layouts.admin.index')
@section('title') {{ $unitExercise->units->name }} @endsection



@section('content')

<div class="content">
   <div class="page-header">
      <div class="page-title">
         <h4>Unit Management</h4>
         <h6>Unit Details</h6>
      </div>
        <div class="page-btn me-lg-5">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="spinner-border spinner-border-sm me-2" role="status"></span> Action</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('admin.unit-exercise.edit', $unitExercise->id) }}">Edit</a>
                    <a class="dropdown-item" href="{{ route('admin.unit-exercise.index') }}">Back</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Home</a>
                </div>
            </div>
        </div>
   </div>


        <div class="row">
        <!-- First Column -->
            <div class="col-md-12 col-lg-11 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-uppercase text-warning">{{ $unitExercise->units->name }}</h4>
                    </div>
                    <div class="card-body">
                        {!! $unitExercise->desc !!}
                    </div>
                    <div class="card-footer text-end">
                        <div class="row">
                            <div class="col-md-9">Created by: <strong>{{ $unitExercise->users->name }}</strong></div>
                            <div class="col-md-3">Last Updated: <strong>{{ $unitExercise->updated_at->toDayDateTimeString() }}</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>






@endsection
