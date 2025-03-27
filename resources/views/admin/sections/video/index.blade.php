@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Video</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.video-section.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <x-image-preview src="{{ asset($video?->background) }}" />
                                <input type="hidden" name="prev_background" value='{{ asset($video?->prev_image) }}'>
                                <x-input-file-block name="background" />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="video_url" label="Video Url" value='{{ $video?->video_url }}' />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" style="resize: none">{{ $video?->description }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="button_text" label="Button Text" value='{{ $video?->button_text }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="button_url" label="Button Url" value='{{ $video?->button_url }}' />
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
