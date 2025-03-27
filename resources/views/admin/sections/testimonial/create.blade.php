@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Testimonial</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <x-input-file-block name="user_image" label="User Image" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Rating</label>
                                <select name="rating" class="form-control">
                                    <option value="">Select rating</option>
                                    @for ($i = 5; $i > 0; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="user_name" label="User Name" />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="user_title" label="User Title" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Review</label>
                                <textarea name="review" class="form-control" style="resize: none"></textarea>
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
