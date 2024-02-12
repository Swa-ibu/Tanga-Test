
<div class="modal fade" id="editCategory-{{ $category->id }}" aria-labelledby="editCategory" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Edit {{ Str::title($category->name) }} category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.category.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="modal-body">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" placeholder="CPA Foundational" name="name" value="{{ $category->name }}" required>
                </div>

                <div class="form-group">
                    <label>Category Icon <span class="text-primary">{!! $category->icon !!}</span>  </label>
                    <input type="text" class="form-control" name="icon" placeholder="<i class='fa-solid fa-book'></i>" value="{{ $category->icon }}">
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
