@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Contact Card</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <x-image-preview src='{{ asset($contact->icon) }}' />
                                <x-input-file-block name="icon" />
                            </div>
                            <div class="col-md-12">
                                <x-input-block name="title" value='{{ $contact->title }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="line_one" label="Line One" value='{{ $contact->line_one }}' />
                            </div>
                            <div class="col-md-6">
                                <x-input-block name="line_two" label="Line Two" value='{{ $contact->line_two }}' />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option @selected($contact->status == 1) value="1">Active</option>
                                    <option @selected($contact->status == 0) value="0">Inactive</option>
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
