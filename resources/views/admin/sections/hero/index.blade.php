@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hero</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-block name="label" value='{{ @$hero->label }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="title" value='{{ @$hero->title }}' />
                            </div>
                            <div class="col-md-12">
                                <x-input-block name="subtitle" value='{{ @$hero->subtitle }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="button_text" label="Button Text" value='{{ @$hero->button_text }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="button_url" label="Button Url" value='{{ @$hero->button_url }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="video_button_text" label="Video Button Text"
                                    value='{{ @$hero->video_button_text }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="video_button_url" label="Video Button Url"
                                    value='{{ @$hero->video_button_url }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="banner_item_title" label="Banner Title"
                                    value='{{ @$hero->banner_item_title }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="banner_item_subtitle" label="Banner Subtitle"
                                    value='{{ @$hero->banner_item_subtitle }}' />
                            </div>
                            <div class="col-md-12">
                                <x-input-block name="round_text" label="Round Text" value='{{ @$hero->round_text }}' />
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" name="prev_image" value='{{ @$hero->image }}'>
                                <x-image-preview src="{{ asset(@$hero->image) }}" />
                                <x-input-file-block name="image" label="Hero Image" />
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
