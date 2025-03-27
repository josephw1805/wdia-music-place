@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Subcategory</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.album-sub-categories.index', $album_category->id) }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form
                        action="{{ route('admin.album-sub-categories.update', ['album_category' => $album_sub_category->parent_id, 'album_sub_category' => $album_sub_category->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <x-input-block name="name" placeholder="Enter Category name" :value="$album_sub_category->name" />
                            </div>
                            <div class="col-md-3">
                                <x-input-toggle-block name="status" label="Status" :checked="$album_sub_category->status" />
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">
                                    <i class="ti ti-device-floppy"></i>
                                    UPdate
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
