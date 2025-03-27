@extends('admin.album.album-module.album-app')

@section('tab_content')
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <form method="POST" class="basic_info_update_form album-form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $album->id }}">
                <input type="hidden" name="current_step" value="1">
                <input type="hidden" name="next_step" value="2">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label class="form-label">Artist</label>
                            <select class="form-select select2" name="artist">
                                <option> Please Select </option>
                                @foreach ($artists as $artist)
                                    <option @selected($album->artist_id == $artist->id) value="{{ $artist->id }}">{{ $artist->name }} -
                                        {{ $artist->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $album->title }}">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label class="form-label">Seo description</label>
                            <input type="text" class="form-control" name="seo_description"
                                value="{{ $album->seo_description }}">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" name="thumbnail">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <img src="{{ $album->thumbnail }}" alt="thumbnail" width="100px;">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label class="form-label">Demo Video Storage</label>
                            <select class="form-select storage" name="demo_video_storage">
                                <option value=""> Please Select </option>
                                <option @selected($album->demo_video_storage == 'upload') value="upload">Upload</option>
                                <option @selected($album->demo_video_storage == 'external_link') value="external_link">External Link</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3 upload_source {{ $album->demo_video_storage == 'upload' ? '' : 'd-none' }}">
                            <label class="form-label">Demo Video Path</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control source_input" type="text" name="file" value="{{ $album->demo_video_source }}">
                            </div>
                        </div>
                        <div class="mb-3 external_source {{ $album->demo_video_storage == 'external_link' ? '' : 'd-none' }}">
                            <label class="form-label">Demo Video Path</label>
                            <input type="text" name="url" class="form-control source_input" value="{{ $album->demo_video_source }}">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" name="price" value="{{ $album->price }}">
                            <p>Put 0 for free</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label class="form-label">Discount Price</label>
                            <input type="text" class="form-control" name="discount" value="{{ $album->discount }}">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3 mb-0">
                            <label class="form-label">Description</label>
                            <textarea rows="6" class="form-control" style="resize: none; text-align: start; height: 59.6px;" name="description">{!! $album->description !!}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
