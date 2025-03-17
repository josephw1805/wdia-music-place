@extends('frontend.artist-dashboard.album.album-app')
@section('album_content')
    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <div class="add_course_more_info">
            <form action="" class="more_info_form album-form">
                @csrf
                <input type="hidden" name="id" value="{{ request()?->id }}">
                <input type="hidden" name="current_step" value="2">
                <input type="hidden" name="next_step" value="3">

                <div class="row">
                    <div class="col-xl-6">
                        <div class="add_course_more_info_input">
                            <label for="#">Album Duration</label>
                            <input type="text" name="duration" value="{{ $album?->duration }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="add_course_more_info_input">
                            <label for="#">Category</label>
                            <select class="select_2" name="category">
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
                        <div class="add_course_more_info_radio_box">
                            <h3>Genere</h3>
                            @foreach ($generes as $genere)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="id-{{ $genere->id }}"
                                        name="genere" value="{{ $genere->id }}" @checked($album->genere_id === $genere->id)>
                                    <label class="form-check-label" for="id-{{ $genere->id }}">
                                        {{ $genere->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="add_course_more_info_radio_box">
                            <h3>Language</h3>
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
                    <div class="col-xl-12">
                        <button type="submit" class="common_btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
