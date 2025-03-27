@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Feature</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contact-setting.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <x-image-preview src="{{ asset(@$contactSetting->image) }}" />
                                <x-input-file-block name="image" />
                            </div>
                            <div class="col-md-12">
                                <x-input-block name="map" value='{{ @$contactSetting->map }}' />
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
