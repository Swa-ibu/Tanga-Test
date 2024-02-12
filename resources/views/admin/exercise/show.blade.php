

<div class="modal fade" id="showLessonExercise-{{ $exercise->id }}" aria-labelledby="showLessonExercise-{{ $exercise->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title text-uppercase fs-5"><strong>{{ $exercise->title }}</strong></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
                {!! $exercise->desc !!}

                <h6 class="modal-title text-warning text-uppercase">Attached to <strong>({{ $exercise->lessons->count() }})</strong> Lessons</h6>
                <ul>
                    @forelse ($exercise->lessons as $lesson)
                        <li>{{ $lesson->title }}</li>
                    @empty
                        <li>No attached lesson</li>
                    @endforelse
                </ul>
          </div>
          <div class="row text-end px-3"> <hr>
            <div class="col-8">Created by: <strong>{{ $exercise->users->name }}</strong></div>
            <div class="col-4">Last updated: <strong>{{ $exercise->updated_at->toDayDateTimeString() }}</strong></div>
          </div>
          <div class="modal-footer text-end">
              <button type="button btn-sm" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
