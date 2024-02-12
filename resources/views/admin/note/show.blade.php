

<!-- Modal -->
<div class="modal fade" id="showNote-{{ $note->id }}" aria-labelledby="showNote-{{ $note->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">{{ $note->lessons->title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
                <p class="text-wrap">{{ $note->desc}}</p>
          </div>
          <div class="modal-footer">
              <button type="button btn-sm" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
