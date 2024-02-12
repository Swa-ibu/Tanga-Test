@extends('layouts.admin.index')
@section('title', 'Courses')


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>All Courses list</h4>
            <h6>View/Search Courses</h6>
        </div>
        <div class="page-btn">


            <a href="{{ route('student.dashboard') }}" class="btn btn-added">
                <img src="{{ asset('frontend/assets/img/back.svg') }}" class="me-1" alt="img">Home
            </a>


        </div>
    </div>

    <div class="row">
        @forelse ($notes as $note)
            <div class="col-md-4 col-sm-6">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon {{ ((($note->id)%2) == 0) ? 'ribbon-primary' : 'ribbon-success' }}">{{ $note->lessons->title }}</div>
                        <p>{{ $note->desc }}</p>
                        <a type="button" class="float-end" data-bs-toggle="modal" data-bs-target="#deleteNote-{{ $note->id }}">
                            <i class="fa-solid fa-trash" style="color: #f62d51;"></i>
                          </a>
                          @include('student.note.delete')
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-4 col-sm-6">
                <div class="ribbon-wrapper card">
                    <div class="card-body">
                        <div class="ribbon ribbon-secondary">Notes</div>
                        <p>No <strong>{{ Auth::user()->name }}'s</strong> notes found. </p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>

@endsection
