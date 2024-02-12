@extends('layouts.admin.index')
@section('title', 'Courses')


@section('content')


<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>{{ $unit->name }}</h4>
            <h6>{{ $unit->topics->count() }} Topics</h6>
        </div>
        <div class="page-btn">


            <a href="{{ route('student.dashboard') }}" class="btn btn-added">
                <img src="{{ asset('frontend/assets/img/back.svg') }}" class="me-1" alt="img">Home
            </a>


        </div>
    </div>

    <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="accordion" id="unitTopicList">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          {{ $unit->name }} Objectives
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#unitTopicList">
                        <div class="accordion-body">
                            {{ $unit->short_desc }}
                        </div>
                      </div>
                    </div>


                    @forelse ($unit->topics as $key=>$topic)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{ $topic->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#topic-{{ $topic->id }}" aria-expanded="false" aria-controls="topic-{{ $topic->id }}">
                                   Topic {{ $key + 1 }}: {{ $topic->name }}
                                </button>
                                </h2>
                                <div id="topic-{{ $topic->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $topic->id }}" data-bs-parent="#unitTopicList">
                                <div class="accordion-body">
                                    <div class="list-group">
                                        @forelse ($topic->lessons as $lesson)
                                            <a href="{{ route('student.resume-learning-lesson', $lesson->slug) }}" class="list-group-item list-group-item-action">{{ $lesson->title }}</a>
                                        @empty
                                            <li class="list-group-item">No lesson found</li>
                                        @endforelse
                                    </div>
                                </div>
                                </div>
                            </div>
                    @empty
                        <p class="lead">No Topic found</p>
                    @endforelse



                  </div>
            </div>
    </div>

</div>


@endsection
