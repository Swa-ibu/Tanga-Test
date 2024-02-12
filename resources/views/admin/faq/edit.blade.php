<!-- Modal -->
<div class="modal fade" id="editFAQ-{{ $faq->id }}" aria-labelledby="faq" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Update a FAQ</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.faq.update', $faq->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="modal-body">
                  <div class="form-group">
                      <label>FAQ Question</label>
                      <input type="text" class="form-control" placeholder="Question" name="name" required maxlength="255" value="{{ $faq->title }}">
                  </div>

                  <div class="form-group">
                      <label>FAQ Answer</label>
                      <textarea name="answer" class="form-control" rows="10">{{ $faq->desc }}</textarea>
                  </div>
          </div>
          <div class="modal-footer">
              <button type="button btn-sm" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit btn-sm" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
