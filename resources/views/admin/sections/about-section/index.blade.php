@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">About Us</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.about-section.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <x-input-block name="round_text" label="Round Text" value='{{ @$about->round_text }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="subscriber_count" label="Subscriber Count"
                                    value='{{ @$about->subscriber_count }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="title" value='{{ @$about->title }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="video_url" label="Video Url" value='{{ @$about->video_url }}' />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="editor">{!! @$about->description !!}</textarea>
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="button_text" label="Button Text"
                                    value='{{ @$about->button_text }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="button_url" label="Button Url" value='{{ @$about->button_url }}' />
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="prev_video_image" value='{{ @$about->video_image }}'>
                                <x-input-file-block name="video_image" label="Video Image" />
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="prev_image" value='{{ @$about->image }}'>
                                <x-input-file-block name="image" label="About Us Image" />
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
