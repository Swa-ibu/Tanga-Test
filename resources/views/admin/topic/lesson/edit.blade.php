
<!-- Modal -->
<div class="modal fade" id="editLesson-{{ $lesson->id }}" tabindex="-1" aria-labelledby="editLesson-{{ $lesson->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editLesson-{{ $lesson->id }}">Edit <strong>{{ $lesson->title }}</strong> lesson</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.lesson.update', $lesson->id) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="topic_id" value="{{ $topic->id }}">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-6">
                        <div class="form-group">
                            <label>Lesson Name/ID</label>
                            <input type="text" placeholder="Lesson 1: Introduction to Financial Analysis" name="name" required value="{{ $lesson->title }}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-6">
                        <div class="form-group">
                            <label>Featured Video</label>
                            <input type="url" class="form-control" placeholder="https://www.youtube.com/watch?v=PjsWr5bRKvQ" name="video" required value="{{ $lesson->featured_video }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-12">
                        <div class="form-group">
                            <label for="lesson_notes">Lesson Notes</label>
                            <textarea name="lesson_notes" id="desc" class="form-control" rows="10">{!! $lesson->content !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
