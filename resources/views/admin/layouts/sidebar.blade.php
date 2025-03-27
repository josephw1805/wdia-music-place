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
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-user-hexagon"></i>
                        </span>
                        <span class="nav-link-title">
                            Artist Requests
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-album"></i>
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
                                <a class="dropdown-item" href="{{ route('admin.album-genres.index') }}">
                                    Album genres
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.certificate-builder.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-certificate"></i></i>
                        </span>
                        <span class="nav-link-title">
                            Certificate Builder
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.orders.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-shopping-cart"></i></i>
                        </span>
                        <span class="nav-link-title">
                            Orders
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.withdraw-request.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-coins"></i></i>
                        </span>
                        <span class="nav-link-title">
                            Payout Requests
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-brand-blogger"></i>
                        </span>
                        <span class="nav-link-title">
                            Content Management
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="{{ route('admin.hero') }}">
                                    Hero
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.feature') }}">
                                    Feature
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.about-section') }}">
                                    About Us
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.latest-album') }}">
                                    Latest Albums
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.become-artist') }}">
                                   Become Artist
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.video-section') }}">
                                   Video
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.brand.index') }}">
                                   Brand
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.featured-artist') }}">
                                   Featured Artist
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.testimonial.index') }}">
                                   Testimonial
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.counter') }}">
                                   Counter
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                        data-bs-auto-close="false" role="button" aria-expanded="false">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-address-book"></i>
                        </span>
                        <span class="nav-link-title">
                            Contact
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                <a class="dropdown-item" href="{{ route('admin.contact.index') }}">
                                    Contact Cards
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.contact-setting') }}">
                                    Contact Setting
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.payout-gateway.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-cash"></i></i>
                        </span>
                        <span class="nav-link-title">
                            Payment Gateways
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.payment-setting.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-adjustments"></i></i>
                        </span>
                        <span class="nav-link-title">
                            Payment Settings
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.settings.index') }}">
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="ti ti-settings"></i></i>
                        </span>
                        <span class="nav-link-title">
                            Site Settings
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
