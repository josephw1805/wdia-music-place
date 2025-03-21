@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Subcategory</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.album-sub-categories.index', $album_category->id) }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.album-sub-categories.store', $album_category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-file-block name='image' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="icon" placeholder="Enter icon class name">
                                    <x-slot name="hint">
                                        <small class="hint">you can get icon classes from <a target="_blank"
                                                href="https://tabler.io/icons">https://tabler.io/icons</a></small>
                                    </x-slot>
                                </x-input-block>
                            </div>
                            <div class="col-md-12">
                                <x-input-block name="name" placeholder="Enter Category name" />
                            </div>
                            <div class="col-md-3">
                                <x-input-toggle-block name="show_at_trending" label="Show at Trending" />
                            </div>
                            <div class="col-md-3">
                                <x-input-toggle-block name="status" label="Status" />
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">
                                    <i class="ti ti-device-floppy"></i>
                                    Create
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
