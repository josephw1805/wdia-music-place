@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Category</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.album-categories.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.album-categories.update', $album_category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <x-image-preview src="{{ $album_category->icon }}" />
                            <div class="col-md-6">
                                <x-input-file-block name="icon" />
                            </div>
                            <div class="col-md-12">
                                <x-input-block name="name" placeholder="Enter Category name" :value="$album_category->name" />
                            </div>
                            <div class="col-md-3">
                                <x-input-toggle-block name="show_at_trending" label="Show at Trending" :checked="$album_category->show_at_trending" />
                            </div>
                            <div class="col-md-3">
                                <x-input-toggle-block name="status" label="Status" :checked="$album_category->status" />
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
