<style>
  .sidebar-brand p {
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
            <p>{{ auth()->user()->name }}</p>
        </div>
    </a>
    <ul class="dashboard_link">
        <li>
            <a class="{{ setActive(['vendor.dashboard.*']) }}" href="{{ route('vendor.dashboard') }}">
                <i class="fas fa-home"></i> Dashboard
            </a>
        </li>
        <li>
            <a class="{{ setActive(['vendor.orders.*']) }}" href="{{ route('vendor.orders.index') }}">
                <i class="fas fa-box"></i> Orders
            </a>
        </li>
        <li>
            <a class="{{ setActive(['vendor.shop-profile.*']) }}" href="{{ route('vendor.shop-profile.index') }}">
                <i class="fas fa-store"></i> My Shop Profile
            </a>
        </li>
        <li>
            <a class="{{ setActive(['vendor.review.*']) }}" href="{{ route('vendor.review.index') }}">
                <i class="fas fa-star"></i> Reviews
            </a>
        </li>
        <li>
            <a class="{{ setActive(['vendor.withdraw.*']) }}" href="{{ route('vendor.withdraw.index') }}">
                <i class="fas fa-dollar-sign"></i> My Withdraw
            </a>
        </li>
        <li>
            <a class="{{ setActive(['vendor.profile']) }}" href="{{ route('vendor.profile') }}">
                <i class="fas fa-user"></i> My Profile
            </a>
        </li>
        <li>
            <a class="{{ setActive(['vendor.products.*']) }}" href="{{ route('vendor.products.index') }}">
                <i class="fas fa-box-open"></i> My Products
            </a>
        </li>
        <li>
            <a class="{{ setActive(['user.dashboard.*']) }}" href="{{ route('user.dashboard') }}">
                <i class="fas fa-user-cog"></i> My Page User
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
