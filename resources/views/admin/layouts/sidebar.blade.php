<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
            aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">Admin
        </h1>
        <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-home"></i>
                        </span>
                        <span class="nav-link-title">
                            Home
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.artist-request.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-home"></i>
                        </span>
                        <span class="nav-link-title">
                            Artist Requests
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-package"></i>
                        </span>
                        <span class="nav-link-title">
                            Album Management
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="{{ route('admin.albums.index') }}">
                                    Albums
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.album-categories.index') }}">
                                    Album Categories
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.album-languages.index') }}">
                                    Album Languages
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.album-generes.index') }}">
                                    Album Generes
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</aside>
