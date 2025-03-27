<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ url('/') }}">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/favicon.png') }}">
    <!-- CSS files -->
    <link href="{{ asset('admin/assets/dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/css/tabler.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/3.28.1/tabler-icons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');
    </style>
    @stack('styles')
    @vite(['resources/css/admin/admin.css', 'resources/js/admin/admin.js'])
</head>

<body>
    <script src="{{ asset('admin/assets/dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page">
        <!-- Sidebar -->
        @include('admin.layouts.sidebar')
        <!-- Navbar -->
        @include('admin.layouts.header')

        <div class="page-wrapper">
            @yield('content')
            @include('admin.layouts.footer')
        </div>
    </div>

    <!-- Modals -->
    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <h3>Are you sure?</h3>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="javascript:;" class="btn w-100" data-bs-dismiss="modal">
                                    Cancel
                                </a></div>
                            <div class="col"><a href="javascript:;" class="btn btn-danger delete-confirm w-100">
                                    Delete
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dynamic-modal" tabindex="-1" data-bs-backdrop='static'>
        <div class="modal-dialog modal-dialog-centered modal-lg dynamic-modal-content"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/js/tabler.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <!--jquery ui js-->
    <script src="{{ asset('frontend/assets/js/jquery-ui.min.js') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('admin/assets/dist/js/demo.min.js') }}" defer></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js" defer></script>
    <script src="{{ asset('admin/assets/dist/libs/tinymce/js/tinymce/tinymce.min.js') }}" defer></script>
    @stack('scripts')
</body>

</html>
