@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Brand</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.brand.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <x-image-preview src='{{ asset($brand->image) }}' />
                                <x-input-file-block name="image" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option @selected($brand->status == 1) value="1">Active</option>
                                    <option @selected($brand->status == 0) value="0">Inactive</option>
                                </select>
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
