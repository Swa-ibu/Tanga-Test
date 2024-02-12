@extends('layouts.admin.index')
@section('title') {{ $unit->name }} @endsection



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
                    <a class="dropdown-item" href="{{ route('admin.unit.edit', $unit->id) }}">Edit</a>
                    <a class="dropdown-item" href="{{ route('admin.unit.index') }}">Back</a>
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
                        <h4 class="card-title text-uppercase text-warning">{{ $unit->name }}</h4>
                        <p class="fst-6">
                            <span class="fw-bold">Course (s):</span>
                            @foreach ($unit->courses as $unit)
                                {{ $unit->name }},
                            @endforeach
                        </p>
                        <hr>
                    </div>
                    <div class="card-body">
                        {!! $unit->desc !!}
                    </div>
                    <div class="card-footer text-end">
                        <div class="row">
                            <div class="col-md-9">Created by: {{ $unit->users->name }}</div>
                            <div class="col-md-3">{{ $unit->updated_at->toDayDateTimeString() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>






@endsection
