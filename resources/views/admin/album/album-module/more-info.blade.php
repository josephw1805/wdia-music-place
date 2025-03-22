@extends('admin.album.album-module.album-app')

@section('tab_content')
    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <div class="add_course_more_info">
            <form action="" class="more_info_form album-form">
                @csrf
                <input type="hidden" name="id" value="{{ request()?->id }}">
                <input type="hidden" name="current_step" value="2">
                <input type="hidden" name="next_step" value="3">

                <div class="row">
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label class="form-label">Album Duration</label>
                            <input type="text" class="form-control" name="duration" value="{{ $album?->duration }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="select2 form-select" name="category" aria-label="Category select">
                                <option disabled selected> Please Select </option>
                                @foreach ($categories as $category)
                                    @if ($category->subCategories->isNotEmpty())
                                        <optgroup label="{{ $category->name }}">
                                            @foreach ($category->subCategories as $subCategory)
                                                <option @selected($album->category_id === $subCategory->id) value="{{ $subCategory->id }}">
                                                    {{ $subCategory->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card mb-3">
                            <h3 class="card-header">Genre</h3>
                            <div class="card-body">
                                @foreach ($genres as $genre)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="id-{{ $genre->id }}"
                                            name="genre" value="{{ $genre->id }}" @checked($album->Genre_id === $genre->id)>
                                        <label class="form-check-label" for="id-{{ $genre->id }}">
                                            {{ $genre->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card mb-3">
                            <h3 class="card-header">Language</h3>
                            <div class="card-body">
                                @foreach ($languages as $language)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="id-{{ $language->id }}"
                                            name="language" value="{{ $language->id }}" @checked($album->language_id === $language->id)>
                                        <label class="form-check-label" for="id-{{ $language->id }}">
                                            {{ $language->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
