@extends('frontend.artist-dashboard.album.album-app')
@section('album_content')
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
        <div class="add_course_basic_info">
            <form method="POST" class="basic_info_update_form album-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $album->id }}">
                <input type="hidden" name="current_step" value="1">
                <input type="hidden" name="next_step" value="2">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ $album->title }}">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput">
                            <label class="form-label">Seo description</label>
                            <input type="text" name="seo_description" value="{{ $album->seo_description }}">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput">
                            <label class="form-label">Thumbnail</label>
                            <input type="file" name="thumbnail">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label class="form-label">Demo Video Storage</label>
                            <select class="select_js storage" name="demo_video_storage">
                                <option value=""> Please Select </option>
                                <option @selected($album->demo_video_storage == 'upload') value="upload">Upload</option>
                                <option @selected($album->demo_video_storage == 'external_link') value="external_link">External Link</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div
                            class="add_course_basic_info_imput upload_source  {{ $album->demo_video_storage == 'upload' ? '' : 'd-none' }}">
                            <label class="form-label">Demo Video Path</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control source_input" type="text" name="file"
                                    value="{{ $album->demo_video_source }}">
                            </div>
                        </div>
                        <div
                            class="add_course_basic_info_imput external_source {{ $album->demo_video_storage == 'external_link' ? '' : 'd-none' }}">
                            <label class="form-label">Demo Video Path</label>
                            <input type="text" name="url" class="source_input"
                                value="{{ $album->demo_video_source }}">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label class="form-label">Price</label>
                            <input type="text" name="price" value="{{ $album->price }}">
                            <p>Put 0 for free</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label class="form-label">Discount Price</label>
                            <input type="text" name="discount" value="{{ $album->discount }}">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput mb-0">
                            <label class="form-label">Description</label>
                            <textarea name="description">{!! $album->description !!}</textarea>
                            <button type="submit" class="common_btn mt_20">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#lfm').filemanager('file');
    </script>
@endpush
