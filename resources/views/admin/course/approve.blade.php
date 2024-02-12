
<div class="modal fade" id="approveCourse-{{ $course->id }}" aria-labelledby="approveCourse" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">{{ $course->status? 'De-activate Course' : 'Activate Course' }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.approve', $course->id) }}" method="post">
        @csrf
        @method('PATCH')

        <div class="modal-body">
            @if ($course->status)
                <p class="text-warning text-wrap">This course will not be available again on the website and cannot be accessed by students.</p>
            @else
                <p class="text-info text-wrap">This course will now be available on the website and students will be able to enroll. </p>
            @endif


            <p class="text-muted">Type <span class="fst-italic text-monospace">confirm</span> to proceed</p>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="confirm" name="name" required>
                </div>


        </div>
        <div class="modal-footer">
            <button type="button btn-sm" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit btn-sm" class="btn btn-primary">{{ $course->status? 'De-activate' : 'Activate' }}</button>
        </div>
      </form>
    </div>
  </div>
</div>
