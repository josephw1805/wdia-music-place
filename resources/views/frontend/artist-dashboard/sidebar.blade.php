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
                <a href="{{ route('artist.dashboard') }}">
                    <div class="img">
                        <i class="fas fa-th-large"></i>
                    </div>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('artist.profile.index') }}">
                    <div class="img">
                        <i class="far fa-user-alt"></i>
                    </div>
                    Profile
                </a>
            </li>
            <li>
                <a href="{{ route('artist.albums.index') }}">
                    <div class="img">
                        <i class="fas fa-album-collection"></i>
                    </div>
                    Albums
                </a>
            </li>
            <li>
                <a href="{{ route('artist.gateways.index') }}">
                    <div class="img">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    Payment Gateway
                </a>
            </li>
            <li>
                <a href="{{ route('artist.withdrawals.index') }}">
                    <div class="img">
                        <i class="far fa-sack-dollar"></i>
                    </div>
                    Withdrawals
                </a>
            </li>
            <li>
                <a href="{{ route('artist.orders.index') }}">
                    <div class="img">
                        <i class="far fa-shopping-cart"></i>
                    </div>
                    Orders
                </a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="" onclick="event.preventDefault(); this.closest('form').submit();">
                        <div class="img">
                            <i class="far fa-sign-out"></i>
                        </div>
                        Sign Out
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
