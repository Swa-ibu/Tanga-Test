@extends('layouts.admin.index')
@section('title', 'Answer Question')

@section('content')

<div class="content">
   <div class="page-header">
      <div class="page-title">
         <h4>Question Management</h4>
         <h6>Add/Update Question</h6>
      </div>
      <div class="page-btn me-lg-5">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="spinner-border spinner-border-sm me-2" role="status"></span> Actions</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('admin.unit.index') }}">Back</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Home</a>
            </div>
        </div>
    </div>
   </div>


    <form action="{{ route('admin.question.update', $question->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="row">
        <!-- First Column -->
            <div class="col-md-12 col-lg-11 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-3">
                            <!-- Name -->
                            <p class="lead text-uppercase text-warning text-decoration-underline">Question</p>
                            <p class="text-muted">
                                {{ $question->question }}
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 my-3">
                                <label class="form-label"> Answer Question</label>
                                <textarea class="form-control" name="answer" placeholder="Answer" rows="4" id="desc">{{ $question->answer }}</textarea>
                            </div>
                        </div>
                        <div class="row text-end">
                            <div class="col-lg-12">
                            <a href="{{ route('admin.question.index') }}" class="btn btn-cancel">Cancel</a>
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
@endsection
