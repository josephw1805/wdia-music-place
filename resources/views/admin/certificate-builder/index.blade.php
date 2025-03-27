@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Certificate Content</h3>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-important alert-primary role="alert"">
                                <h4 class="alert-heading">Default Variables</h4>
                                <p>[user_name], [album_name]</p>
                            </div>
                            <form action="{{ route('admin.certificate-builder.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <x-input-block name="title" label="Certificate Title"
                                    placeholder="Enter certificate title" value="{{ @$certificate->title }}" />
                                <x-input-block name="sub_title" label="Certificate Subtitle"
                                    placeholder="Enter certificate subtitle" value="{{ @$certificate->sub_title }}" />
                                <div class="mb-3">
                                    <label class="form-label">Certificate Description</label>
                                    <textarea name="description" rows="5" class="form-control" placeholder="Enter certificate description"
                                        style="resize: none;">{!! @$certificate->description !!}</textarea>
                                </div>
                                @if (@$certificate->background)
                                    <x-image-preview src="{{ asset($certificate->background) }}" />
                                @endif
                                <x-input-file-block name='background' />
                                @if (@$certificate->signature)
                                    <x-image-preview src="{{ asset($certificate->signature) }}" />
                                @endif
                                <x-input-file-block name='signature' />
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Certificate Builder</h3>
                        </div>
                        <div class="card-body">
                            <div class="certificate-body"
                                style="background-image: url({{ asset(@$certificate->background) }});">
                                <div id="title" class="title draggable-element">{{ @$certificate->title }}</div>
                                <div id="sub_title" class="subtitle draggable-element">{{ @$certificate->sub_title }}</div>
                                <div id="description" class="description draggable-element">{!! @$certificate->description !!}</div>
                                <img id="signature" class="draggable-element" src="{{ asset(@$certificate->signature) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        @foreach ($certificateItems as $item)
            #{{ $item->element_id }} {
                left: {{ $item->x_position }}px;
                top: {{ $item->y_position }}px;
            }
        @endforeach
    </style>
@endpush
