
<div class="modal fade" id="activateReview-{{ $review->id }}" aria-labelledby="activateReview" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-uppercase">{{ $review->status? 'Deactivate' : 'Activate' }} review</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.review.update', $review->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="modal-body">
            <h5 class="danger modal-title">Are you sure you want to {{ $review->status? 'Deactivate' : 'Activate' }} this review?</h5>
            <p class="muted">Type <span class="fst-italic">confirm</span> to {{ $review->status? 'Deactivate' : 'Activate' }} the review. </p>
            <input type="text" name="confirm" id="confirm" class="form-control" placeholder="confirm" required>
          </div>
        <div class="modal-footer">
            <button type="button btn-sm" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit btn-sm" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
