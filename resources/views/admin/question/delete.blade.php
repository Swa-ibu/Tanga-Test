<!-- Modal -->
<div class="modal fade" id="deleteQuestion-{{ $question->id }}" tabindex="-1" aria-labelledby="deleteQuestionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteQuestionLabel">Delete Question</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.question.destroy', $question->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                <h5 class="danger modal-title">Are you sure you want to delete this question?</h5>
                <p class="muted">Type <span class="fst-italic">confirm</span> to delete the note. </p>
                <input type="text" name="confirm" id="confirm" class="form-control" placeholder="confirm" required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                <button type="confirm" class="btn btn-danger">Delete</button>
              </div>
        </form>
      </div>
    </div>
  </div>
