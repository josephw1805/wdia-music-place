<div class="col-xl-3 col-md-4 wow fadeInLeft">
    <div class="wsus__dashboard_sidebar">
        <div class="wsus__dashboard_sidebar_top">
            <div class="dashboard_banner">
                <img src="{{ asset('frontend/assets/images/single_topic_sidebar_banner.jpg') }}" alt="img"
                    class="img-fluid">
            </div>
            <div class="img">
                <img src="{{ asset(auth()->user()->image) }}" alt="profile" class="img-fluid w-100">
            </div>
            <h4>{{ auth()->user()->name }}</h4>
            <p>{{ auth()->user()->role }}</p>
        </div>
        <ul class="wsus__dashboard_sidebar_menu">
            <li>
                <a href="{{ route('artist.dashboard') }}"
                    class="{{ request()->is('artist/dashboard') ? 'active' : '' }}">
                    <div class="img">
                        <img src="{{ asset('frontend/assets/images/dash_icon_8.png') }}" alt="icon"
                            class="img-fluid w-100">
                    </div>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('artist.profile.index') }}"
                    class="{{ request()->is('artist/profile*') ? 'active' : '' }}">
                    <div class="img">
                        <img src="{{ asset('frontend/assets/images/dash_icon_1.png') }}" alt="icon"
                            class="img-fluid w-100">
                    </div>
                    Profile
                </a>
            </li>
            <li>
                <a href="{{ route('artist.albums.index') }}" class="{{ request()->is('artist/albums*') ? 'active' : '' }}">
                    <div class="img">
                        <img src="{{ asset('frontend/assets/images/dash_icon_2.png') }}" alt="icon"
                            class="img-fluid w-100">
                    </div>
                    Albums
                </a>
            </li>
            <li>
                <a href="dashboard_artist.html">
                    <div class="img">
                        <img src="{{ asset('frontend/assets/images/dash_icon_6.png') }}" alt="icon"
                            class="img-fluid w-100">
                    </div>
                    Followers
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="" onclick="event.preventDefault(); this.closest('form').submit();">
                        <div class="img">
                            <img src="{{ asset('frontend/assets/images/dash_icon_16.png') }}" alt="icon"
                                class="img-fluid w-100">
                        </div>
                        Sign Out
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
