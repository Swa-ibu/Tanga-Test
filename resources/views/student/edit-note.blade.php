<!-- Modal -->
<div class="modal fade" id="editNotes-{{ $lessonNote->id }}" tabindex="-1" aria-labelledby="studentLessonNotes" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="studentLessonNotes">{{ $lesson->title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('student.note.update', $lessonNote->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Add lesson Notes" name="notes" id="notes" style="height: 200px">{{ $lessonNote->desc }}</textarea>
                    <label for="notes">Lesson Notes</label>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
