<style>
    .sidebar-brand {
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-weight: 700;
        color: #e83e8c;
    }
</style>

<div class="dashboard_sidebar">
    <span class="close_icon">
        <i class="fas fa-bars dash_bar"></i>
        <i class="fas fa-times dash_close"></i>
    </span>
    <a href="dashboard.html" class="dash_logo">
        <div class="sidebar-brand">
            {{ auth()->user()->name }}
        </div>
    </a>

    <ul class="dashboard_link">
        <li>
            <a class="{{ setActive(['user.dashboard']) }}" href="{{ route('user.dashboard') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        @if (auth()->user()->role === 'vendor')
            <li>
                <a class="{{ setActive(['vendor.dashboard']) }}" href="{{ route('vendor.dashboard') }}">
                    <i class="fas fa-store"></i> Go to Vendor
                </a>
            </li>
        @endif
        <li>
            <a class="{{ setActive(['user.orders.*']) }}" href="{{ route('user.orders.index') }}">
                <i class="fas fa-box"></i> Orders
            </a>
        </li>
        <li>
            <a class="{{ setActive(['user.review.*']) }}" href="{{ route('user.review.index') }}">
                <i class="fas fa-star"></i> Reviews
            </a>
        </li>
        <li>
            <a class="{{ setActive(['user.profile']) }}" href="{{ route('user.profile') }}">
                <i class="fas fa-user"></i> My Profile
            </a>
        </li>
        @if (auth()->user()->role !== 'vendor')
            <li>
                <a class="{{ setActive(['user.vendor-request.*']) }}" href="{{ route('user.vendor-request.index') }}">
                    <i class="fas fa-user-plus"></i> Request to be Vendor
                </a>
            </li>
        @endif
        <li>
            <a class="{{ setActive(['user.address.*']) }}" href="{{ route('user.address.index') }}">
                <i class="fas fa-map-marker-alt"></i> Addresses
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Log out
                </a>
            </form>
        </li>
    </ul>
</div>
