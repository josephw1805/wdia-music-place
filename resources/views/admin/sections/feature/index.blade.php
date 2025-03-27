@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Feature</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.feature.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <x-image-preview src="{{ asset(@$feature->image_one) }}" style="background-color: gray" />
                                <input type="hidden" name="prev_image_one" value='{{ asset(@$feature->prev_image_one) }}'>
                                <x-input-file-block name="image_one" label="Image One" />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="title_one" label="Title One" value='{{ @$feature->title_one }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="subtitle_one" label="Subtitle One"
                                    value='{{ @$feature->subtitle_one }}' />
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <x-image-preview src="{{ asset(@$feature->image_two) }}" style="background-color: gray" />
                                <input type="hidden" name="prev_image_two" value='{{ asset(@$feature->prev_image_two) }}'>
                                <x-input-file-block name="image_two" label="Image Two" />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="title_two" label="Title Two" value='{{ @$feature->title_two }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="subtitle_two" label="Subtitle Two"
                                    value='{{ @$feature->subtitle_two }}' />
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <x-image-preview src="{{ asset(@$feature->image_three) }}" style="background-color: gray" />
                                <input type="hidden" name="prev_image_three"
                                    value='{{ asset(@$feature->prev_image_three) }}'>
                                <x-input-file-block name="image_three" label="Image Three" />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="title_three" label="Title Three"
                                    value='{{ @$feature->title_three }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="subtitle_three" label="Subtitle Three"
                                    value='{{ @$feature->subtitle_three }}' />
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
