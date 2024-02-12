@extends('layouts.admin.index')
@section('title') {{ $topic->name }} @endsection



@section('content')

<div class="content">
   <div class="page-header">
      <div class="page-title">
         <h4>Topic Management</h4>
         <h6>Topic Details</h6>
      </div>
        <div class="page-btn me-lg-5">
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="spinner-border spinner-border-sm me-2" role="status"></span> Action</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('admin.topic.edit', $topic->id) }}">Edit</a>
                    <a class="dropdown-item" href="{{ route('admin.topic.edit', $topic->id) }}">Edit</a>
                    <a class="dropdown-item" href="{{ route('admin.topic.index') }}">Back</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Home</a>
                </div>
            </div>
        </div>
   </div>


        <div class="row">
        <!-- First Column -->
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-uppercase text-warning">{{ $topic->name }}</h4>
                        <p class="fst-6">
                            <span class="fw-bold">Course (s):</span>
                            {{ $topic->units->name }}
                        </p>
                        <hr>
                    </div>
                    <div class="card-body">
                        {!! $topic->desc !!}
                    </div>
                    <div class="card-footer text-end">
                        <div class="row">
                            <div class="col-md-6">Created by: {{ $topic->users->name }}</div>
                            <div class="col-md-6">{{ $topic->updated_at->toDayDateTimeString() }}</div>
                        </div>
                    </div>
                </div>
            </div>



            {{-- Second Column --}}

            <div class="col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <p class="h4 text-warning card-title text-uppercase">Lesson Lists</p>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#createNewLesson">
                                    New Lesson
                                  </button>
                                  @include('admin.topic.lesson.create')
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="accordion" id="{{ $topic->slug }}-lessonList">

                            @forelse ($lessons as $lesson)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $lesson->id }}" aria-expanded="false" aria-controls="collapse-{{ $lesson->id }}">
                                        {{ $lesson->title }}
                                    </button>
                                    </h2>
                                    <div id="collapse-{{ $lesson->id }}" class="accordion-collapse collapse" data-bs-parent="#{{ $topic->slug }}-lessonList">
                                    <div class="accordion-body">
                                        <iframe src="{{ $lesson->featured_video }}" title="{{ $lesson->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        {!! $lesson->content !!}
                                        <div class="row mt-md-3 mt-lg-5 py-md-2">
                                            {{-- <hr class="border border-warning border-1 opacity-75"> --}}
                                            <div class="col-5">
                                                <h5 class="text-uppercase text-warning">Lesson Exercises</h5>
                                                <ol type="1">
                                                    @forelse ($lesson->exercises as $exercise)
                                                        <li>
                                                            <a type="button" data-bs-toggle="modal" data-bs-target="#showLessonExercise-{{ $exercise->id }}">
                                                                {{ $exercise->title }} <i class="fa-solid fa-arrow-up-right-from-square fa-beat-fade" style="color: #ff9f43;"></i>
                                                            </a>
                                                            @include('admin.exercise.show')
                                                        </li>
                                                    @empty
                                                        <li>No attached Exercise.</li>
                                                    @endforelse
                                                </ol>
                                            </div>
                                            <div class="col-7 text-end">
                                                <button type="button" class="btn btn-primary align-middle" data-bs-toggle="modal" data-bs-target="#editLesson-{{ $lesson->id }}">
                                                     Edit Lesson
                                                  </button>
                                                  @include('admin.topic.lesson.edit')
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @empty
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        No Lesson Uploaded yet
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#{{ $topic->slug }}-lessonList">
                                    <div class="accordion-body">
                                        No lesson uploaded yet
                                    </div>
                                    </div>
                                </div>
                            @endforelse

                          </div>
                    </div>
                </div>
            </div>






        </div>
</div>






@endsection
