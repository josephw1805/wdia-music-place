@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Album</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.albums.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="" class="nav-link album-tab {{ request('step') == 1 ? 'active' : '' }}"
                                data-step="1">Basic
                                Infos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="" class="nav-link album-tab {{ request('step') == 2 ? 'active' : '' }}"
                                data-step="2">More
                                Infos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="" class="nav-link album-tab {{ request('step') == 3 ? 'active' : '' }}"
                                data-step="3">Album
                                Contents</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="" class="nav-link album-tab {{ request('step') == 4 ? 'active' : '' }}"
                                data-step="4">Finish</a>
                        </li>
                    </ul>
                    @yield('tab_content')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        $('#lfm').filemanager('file', {
            prefix: '/admin/laravel-filemanager'
        });
    </script>
@endpush

@push('scripts')
    @vite(['resources/js/admin/album.js'])
@endpush
