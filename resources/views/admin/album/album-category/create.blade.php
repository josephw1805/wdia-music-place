@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Category</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.album-categories.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.album-categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <x-input-file-block name="icon">
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
                                    Save
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
