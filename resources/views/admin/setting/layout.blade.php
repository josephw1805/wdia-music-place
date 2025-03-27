@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Site Settings</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="row g-0">
                            @include('admin.setting.sidebar')
                            @yield('setting-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
