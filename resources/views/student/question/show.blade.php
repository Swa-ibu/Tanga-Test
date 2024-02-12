
<!-- Modal -->
<div class="modal fade" id="showQuestion-{{ $question->id }}" tabindex="-1" aria-labelledby="showQuestionLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="showQuestionLabel">{{ $question->lessons->title }} Question</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6 class="modal-title text-uppercase text-warning">Question</h6>
          <p class="text-muted mb-3 text-wrap font-monospace">{{ $question->question }}</p>

          <h6 class="modal-title text-uppercase text-warning">Answer</h6>
          @if (empty($question->answer))
            <p class="text-muted text-monospace fst-italic">Question not answered</p>
          @else
            <p class="text-muted">{!! $question->answer !!}</p>
            <p class="text-muted fst-italic text-end">Answered by: <strong>{{ $question->answeredBy->name }}</strong></p>
          @endif
        </div>
        <div class="modal-footer text-end">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
