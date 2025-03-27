<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <i class="ti ti-moon"></i>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <i class="ti ti-sun"></i>
                </a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url({{ asset('default-files/avatar.png') }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ auth('admin')->user()->name }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <!-- Authentication -->
                    <form method="POST" id="logout" action="{{ route('admin.logout') }}">
                        @csrf
                        <span
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="dropdown-item">Logout</span>
                    </form>
                </div>
            </div>
        </div>
        <div></div>
    </div>
</header>
