@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Become Artist</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.become-artist.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <x-image-preview src="{{ asset($becomeArtist->image) }}" />
                                <input type="hidden" name="prev_image" value='{{ asset($becomeArtist->image) }}'>
                                <x-input-file-block name="image" />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="title" label="Title" value='{{ $becomeArtist->title }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="subtitle" label="Subtitle" value='{{ $becomeArtist->subtitle }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="button_text" label="Button Text"
                                    value='{{ $becomeArtist->button_text }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="button_url" label="Button Url"
                                    value='{{ $becomeArtist->button_url }}' />
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i class="ti ti-device-floppy"></i>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
