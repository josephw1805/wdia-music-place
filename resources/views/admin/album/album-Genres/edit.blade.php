@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Album Genres</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.album-genres.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.album-genres.update', $album_Genre->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-input-block name="name" placeholder="Enter genre name" value="{{ $album_Genre->name }}" />
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit"><i class="ti ti-device-floppy"></i>
                                Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
