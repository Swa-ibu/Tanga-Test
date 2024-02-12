

<!-- Modal -->
<div class="modal fade" id="showFAQ-{{ $faq->id }}" aria-labelledby="showFAQ-{{ $faq->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">FAQ Details</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
                <p class="fw-bold text-wrap">{{ $faq->title }}</p>
                <p class="text-wrap">{{ $faq->desc}}</p>
          </div>
          <div class="modal-footer">
              <button type="button btn-sm" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
