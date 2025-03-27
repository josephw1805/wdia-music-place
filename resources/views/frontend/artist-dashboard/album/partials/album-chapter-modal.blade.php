<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Chapter</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form
            action="{{ @$editMode ? route('artist.album-content.update-chapter', @$chapter->id) : route('artist.album-content.store-chapter', $id) }}"
            method="POST">
            @csrf
            <div class="form-group mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ @$chapter->title }}" required>
            </div>
            <div class="form-group text-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
