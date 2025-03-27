<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin - Forgot Password</title>
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
</head>

<body class=" d-flex flex-column">
    <script src="{{ asset('admin/assets/dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="card card-md">
                <div class="card-body">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <form method="POST" action="{{ route('admin.password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-2">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" type="email" name="email"
                                value="{{ old('email') }}" placeholder="your@email.com" autocomplete="off">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="btn btn-primary w-100">
                                {{ __('Email Password Reset Link') }}
                            </button>
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
