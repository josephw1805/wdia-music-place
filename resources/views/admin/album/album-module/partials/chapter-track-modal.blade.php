<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ @$editMode ? 'Edit' : 'Create' }} Chapter Track</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form
            action="{{ @$editMode ? route('admin.album-content.update-track', $track->id) : route('admin.album-content.store-track') }}"
            method="POST">
            @csrf
            <input type="hidden" name="album_id" value="{{ $albumId }}">
            <input type="hidden" name="chapter_id" value="{{ $chapterId }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="add_course_basic_info_imput">
                        <label class="form-label">Title</label>
                        <input class="form-control" type="text" name="title" value="{{ @$track->title }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="add_course_basic_info_imput">
                        <label class="form-label">Video Source</label>
                        <select class="form-control storage" name="source" required>
                            <option value=""> Please Select </option>
                            @foreach (config('album.video_sources') as $source => $name)
                                <option @selected(@$track->storage == $source) value="{{ $source }}">{{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div
                        class="add_course_basic_info_imput upload_source {{ @$track->storage == 'upload' ? '' : 'd-none' }}">
                        <label class="form-label">Video Path</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control source_input" type="text" name="file"
                                value="{{ @$track->file_path }}">
                        </div>
                    </div>
                    <div
                        class="add_course_basic_info_imput external_source {{ @$track->storage != 'upload' ? '' : 'd-none' }}">
                        <label class="form-label">Video Path</label>
                        <input type="text" name="url" class="form-control source_input"
                            value="{{ @$track->file_path }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="add_course_basic_info_imput">
                        <label class="form-label">Duration</label>
                        <input class="form-control" type="text" name="duration" value="{{ @$track->duration }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="add_course_more_info_checkbox">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_preview" value="1"
                                id="preview" @checked(@$track->is_preview == 1)>
                            <label class="form-check-label" for="preview">Is Preview</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="downloadable" value="1"
                                id="downloable" @checked(@$track->downloadable == 1)>
                            <label class="form-check-label" for="downloable">Downloadable</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="add_course_basic_info_imput">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" style="resize: none; text-align: start; height: 59.6px;" name="description">{!! @$track->description !!}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group text-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
<script type="module">
    $('#lfm').filemanager('file', {
        prefix: '/admin/laravel-filemanager'
    });
</script>
