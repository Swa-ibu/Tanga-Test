@extends('layouts.admin.index')
@section('title') {{ $lesson->title }} @endsection


@section('content')


@prepend('styles')
<style>
    .embed-youtube {
    position: relative;
    padding-bottom: 56.25%; /* - 16:9 aspect ratio (most common) */
    /* padding-bottom: 62.5%; - 16:10 aspect ratio */
    /* padding-bottom: 75%; - 4:3 aspect ratio */
    padding-top: 30px;
    height: 0;
    overflow: hidden;
    border-radius: 1%;
}

    .embed-youtube iframe,
    .embed-youtube object,
    .embed-youtube embed {
        border: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
@endprepend



<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Unit: {{ $lesson->topics->units->name }}</h4>
            <h6>Topic: {{ $lesson->topics->name }}</h6>
        </div>
        <div class="page-btn">


            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-gear fa-spin"></i> Actions
                </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);">Add Notes</a>
                            <a class="dropdown-item" href="javascript:void(0);">Ask Question</a>
                        <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('student.dashboard') }}">Home</a>
                </div>
            </div>


        </div>
    </div>

            <div class="row">
                <div class="col-lg-12 col-xl-9 mx-auto">
                   <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header"><h5 class="card-title">{{ $lesson->title }}</h5></div>
                            <div class="card-body">
                                <div class="embed-youtube">
                                    <iframe src="{{ $lesson->featured_video }}" title="{{ $lesson->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-white">
                            <div class="card-header">
                                <h5 class="card-title">Additional Lesson Learning Materials</h5>
                            </div>

                            <div class="card-body">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#learningMaterials" data-bs-toggle="tab">Learning Materials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#makeNotes" data-bs-toggle="tab">Add Notes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#askQuestion" data-bs-toggle="tab">Ask Question</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#lessonExcercise" data-bs-toggle="tab">Lesson Exercise</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3">
                                    <div class="tab-pane show active" id="learningMaterials">
                                        <p class="lead text-warning text-uppercase fw-bold text-decoration-underline py-3">Learning Materials</p>
                                        {!! $lesson->content !!}
                                    </div>
                                    <div class="tab-pane" id="makeNotes">
                                        <p class="lead text-warning text-uppercase fw-bold text-decoration-underline">Take Lesson Notes</p>
                                        <form action="{{ route('student.note.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" placeholder="Add lesson Notes" name="notes" id="notes" style="height: 100px"></textarea>
                                                <label for="notes">Lesson Notes</label>
                                              </div>
                                              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                        </form>
                                        <p class="lead text-warning text-uppercase fw-bold text-decoration-underline">My Lesson notes</p>
                                        <ul class="list-group">
                                            @forelse ($lessonNotes as $lessonNote)
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#editNotes-{{ $lessonNote->id }}" class="list-group-item list-group-item-action">{{ $lessonNote->desc }}</a>
                                                @include('student.edit-note')
                                            @empty
                                                <li class="list-group-item">No Notes found</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="askQuestion">
                                        <p class="lead text-warning text-uppercase fw-bold text-decoration-underline">Frequently asked question in this lesson</p>
                                        <p class="fst-italic">Before asking a question please check any question related to your question. </p>

                                        {{-- All questions --}}
                                        <div class="accordion" id="topicLessons">
                                            @forelse ($questions as $question)
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-{{ $question->id }}" aria-expanded="false" aria-controls="question-{{ $question->id }}">
                                                        <span class="text-muted">{{ $question->question }}</span>
                                                        </button>
                                                    </h2>
                                                    <div id="question-{{ $question->id }}" class="accordion-collapse collapse" data-bs-parent="#topicLessons">
                                                        <div class="accordion-body">
                                                            @if (empty($question->answer))
                                                                <p class="text-muted text-warning fst-italic">Question not answered</p>
                                                            @else
                                                                {{ $question->answer }}
                                                            @endif

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <span class="text-muted">By: {{ $question->users->name }}</span>
                                                                </div>
                                                                    @if (!empty($question->answered_by))
                                                                        <div class="col-md-4">
                                                                            <strong>Answered By: </strong> {{ $question->answeredBy->name }}
                                                                        </div>
                                                                    @endif
                                                                <div class="col-md-4"><strong>Date: </strong>{{ $question->created_at->toDayDateTimeString() }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <p class="lead">No question found</p>

                                            @endforelse
                                          </div>

                                          <hr class="border border-warning border-1 opacity-75">

                                          {{-- Post a question --}}
                                          <form action="{{ route('student.question.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                            <input type="hidden" name="topic_id" value="{{ $lesson->topics->id }}">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" placeholder="Ask a question" name="question" id="question" style="height: 100px" maxlength="200"></textarea>
                                                <label for="question">Post a Question <span class="text-warning fst-italic">Max 200 Characters</span></label>
                                              </div>
                                              <button type="submit" class="btn btn-primary btn-sm">Post Question</button>
                                        </form>



                                    </div>
                                    <div class="tab-pane" id="lessonExcercise">
                                        <div class="list-group">
                                            @forelse ($lesson->exercises as $exercise)
                                                <a type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#lessonExercise-{{ $exercise->id }}"
                                                    class="list-group-item list-group-item-action">
                                                    {{ $exercise->title }}
                                                    <i class="fa-solid fa-arrow-up-right-from-square fa-beat-fade" style="color: #ff9f43;"></i>
                                                </a>
                                                @include('student.lesson-exercise')
                                            @empty
                                                <li class="list-group-item">No Attched Lesson Exerise</li>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        {{-- Lesson List --}}
                        <div class="card">
                            <div class="card-header"><h5 class="card-title">Lessons</h5></div>
                            <div class="card-body">
                                <div class="list-group">
                                    @forelse ($allLessons as $allLesson)
                                        @if (in_array($allLesson->id, $learntLessonsArray))
                                            <a href="{{ route('student.resume-learning-lesson', $allLesson->slug) }}"
                                                class="list-group-item list-group-item-action
                                                @if ($lesson->id == $allLesson->id)
                                                    active
                                                @else
                                                    list-group-item-info
                                                @endif">
                                                <input class="form-check-input me-1" type="checkbox" value="1" checked id="firstCheckbox">
                                                {{ $allLesson->title }}
                                            </a>
                                        @else
                                            <a href="{{ route('student.resume-learning-lesson', $allLesson->slug) }}"
                                                class="list-group-item list-group-item-action
                                                @if ($lesson->id == $allLesson->id) active @endif">{{ $allLesson->title }}
                                            </a>
                                        @endif



                                    @empty
                                        <li class="list-group-item">No Lesson found</li>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        {{-- Unit exercise  --}}
                        <div class="card">
                            <div class="card-header"><h5 class="card-title">End of units Exercise</h5></div>
                            <div class="card-body">
                                <div class="list-group">
                                    @if (empty($lesson->topics->units->unitExercises))
                                        <a href="#" target="_blank" class="list-group-item list-group-item-action">
                                            No attached Exercise
                                        </a>
                                    @else
                                        <a href="{{ route('student.show-unit-exercise', $lesson->topics->units->unitExercises->slug) }}" target="_blank" class="list-group-item list-group-item-action">
                                            {{ $lesson->topics->units->name }}
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
</div>


@endsection
