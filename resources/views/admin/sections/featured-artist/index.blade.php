@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-name">Featured Artist</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.featured-artist.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Artist</label>
                                <select class="select2 form-control select_artist" name="artist"
                                    aria-label="Artist select">
                                    <option disabled selected> Please Select </option>
                                    @foreach (@$artists as $artist)
                                        <option value="{{ $artist->id }}" @selected(@$featuredArtist->artist == $artist->id)>
                                            {{ $artist->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Albums</label>
                                <select class="select2 form-control artist_albums" name="featured_albums[]"
                                    aria-label="Album select" multiple>
                                    @foreach (@$selectedArtistAlbums as $album)
                                        <option @selected(in_array($album->id, $selectedAlbums)) value="{{ $album->id }}">{{ $album->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <x-image-preview src="{{ asset(@$featuredArtist->artist_image) }}" />
                                <input type="hidden" name="prev_artist_image" value='{{ @$featuredArtist->artist_image }}'>
                                <x-input-file-block name="artist_image" />
                            </div>
                            <div class="col-md-12">
                                <x-input-block name="title" value='{{ @$featuredArtist->title }}' />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Subtitle</label>
                                <textarea class="form-control" name="subtitle" style="resize: none">{!! @$featuredArtist->subtitle !!}</textarea>
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="button_text" label="Button Text"
                                    value='{{ @$featuredArtist->button_text }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="button_url" label="Button Url"
                                    value='{{ @$featuredArtist->button_url }}' />
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">
                            <i class="ti ti-device-floppy"></i>
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
