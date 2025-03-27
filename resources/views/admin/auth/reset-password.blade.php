<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin - Reset Password</title>
    <!-- CSS files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/css/tabler.min.css" />
    <link href="{{ asset('admin/assets/dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    @vite(['resources/js/admin/login.js'])
</head>

<body class=" d-flex flex-column">
    <script src="{{ asset('admin/assets/dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="card card-md">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div>
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email"
                                value="{{ old('email', $request->email) }}" autocomplete="off">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <!-- Password -->
                        <div class="mt-4">
                            <label class="form-label">
                                Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control password" name="password"
                                    placeholder="Your password" autocomplete="off">
                                <span class="input-group-text toggle-password">
                                    <a href="javascript:;" class="link-secondary" title="Show password"
                                        data-bs-toggle="tooltip"><i class="ti ti-eye"></i>
                                    </a>
                                </span>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <label class="form-label">
                                Confirm Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input id="password_confirmation" class="form-control confirm-password"
                                    name="password_confirmation" type="password" name="password_confirmation" required
                                    autocomplete="new-password">
                                <span class="input-group-text toggle-confirm-password">
                                    <a href="javascript:;" class="link-secondary" title="Show password"
                                        data-bs-toggle="tooltip"><i class="ti ti-eye"></i>
                                    </a>
                                </span>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="btn btn-primary w-100"> {{ __('Reset Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabler Core -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.1.1/dist/js/tabler.min.js"></script>
    <script src="{{ asset('admin/assets/dist/js/demo.min.js?1692870487') }}" defer></script>
</body>

</html>
