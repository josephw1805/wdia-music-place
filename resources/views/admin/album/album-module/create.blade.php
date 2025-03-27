@extends('admin.album.album-module.album-app')

@section('tab_content')
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <form action="{{ route('admin.albums.store-basic-info') }}" method="POST" class="basic_info_form album-form"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="current_step" value="1">
                <input type="hidden" name="next_step" value="2">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label class="form-label">Artist</label>
                            <select class="form-select select2" name="artist">
                                <option> Please Select </option>
                                @foreach ($artists as $artist)
                                    <option value="{{ $artist->id }}">{{ $artist->name }} - {{ $artist->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label class="form-label">Seo description</label>
                            <input type="text" class="form-control" name="seo_description">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" name="thumbnail">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label class="form-label">Demo Video Storage</label>
                            <select class="form-select storage" name="demo_video_storage">
                                <option value=""> Please Select </option>
                                <option value="upload">Upload</option>
                                <option value="external_link">External Link</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3 upload_source">
                            <label class="form-label">Demo Video Path</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control source_input" type="text" name="file">
                            </div>
                        </div>
                        <div class="mb-3 external_source d-none">
                            <label class="form-label">Demo Video Path</label>
                            <input type="text" name="url" class="form-control source_input">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control" name="price">
                            <p>Put 0 for free</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label class="form-label">Discount Price</label>
                            <input type="text" class="form-control" name="discount">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="mb-3 mb-0">
                            <label class="form-label">Description</label>
                            <textarea rows="6" class="form-control" style="resize: none; text-align: start; height: 59.6px;" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
