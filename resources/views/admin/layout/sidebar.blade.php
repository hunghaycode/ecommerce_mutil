<style>
        .sidebar-brand a {
          text-decoration: none;
          text-transform: uppercase;
          letter-spacing: 1.5px;
          font-weight: 700;
          color: #e83e8c;
        }
      </style>
      
      <div class="main-sidebar sidebar-style-2">
          <aside id="sidebar-wrapper">
              <div class="sidebar-brand">
                  <a href="index.html">Stisla</a>
              </div>
              <div class="sidebar-brand sidebar-brand-sm">
                  <a href="index.html">St</a>
              </div>
              <ul class="sidebar-menu">
                  <li class="menu-header">Dashboard</li>
                  <li class="dropdown active">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                      <ul class="dropdown-menu">
                          <li class="active"><a class="nav-link" href="{{ route('admin.dashboard') }}">General Dashboard</a></li>
                          <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                      </ul>
                  </li>
      
                  <li class="menu-header">Categories</li>
                  <li class="dropdown {{ setActive(['admin.category.*', 'admin.sub-category.*', 'admin.child-category.*']) }}">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-tags"></i><span>Manage Categories</span></a>
                      <ul class="dropdown-menu">
                          <li class="{{ setActive(['admin.category.*']) }}"><a class="nav-link" href="{{ route('admin.category.index') }}">Categories</a></li>
                          <li class="{{ setActive(['admin.sub-category.*']) }}"><a class="nav-link" href="{{ route('admin.sub-category.index') }}">Sub Categories</a></li>
                          <li class="{{ setActive(['admin.child-category.*']) }}"><a class="nav-link" href="{{ route('admin.child-category.index') }}">Child Categories</a></li>
                      </ul>
                  </li>
      
                  <li class="dropdown {{ setActive(['admin.slider.*']) }}">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-sliders-h"></i><span>Manage Web</span></a>
                      <ul class="dropdown-menu">
                          <li class="{{ setActive(['admin.slider.*']) }}"><a class="nav-link" href="{{ route('admin.slider.index') }}">Slider</a></li>
                      </ul>
                  </li>
      
                  <li class="dropdown {{ setActive([
                      'admin.brand.*',
                      'admin.products.*',
                      'admin.seller-products.*',
                      'admin.products-image-gallery.*',
                      'admin.seller-products-pending.*',
                      'admin.review-product.*',
                  ]) }}">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-box"></i><span>Manage Products</span></a>
                      <ul class="dropdown-menu">
                          <li class="{{ setActive(['admin.brand.*']) }}"><a class="nav-link" href="{{ route('admin.brand.index') }}">Brand</a></li>
                          <li class="{{ setActive(['admin.products.*', 'admin.products-image-gallery.*']) }}"><a class="nav-link" href="{{ route('admin.products.index') }}">Products</a></li>
                          <li class="{{ setActive(['admin.seller-products.*']) }}"><a class="nav-link" href="{{ route('admin.seller-products.index') }}">Seller Products</a></li>
                          <li class="{{ setActive(['admin.seller-products-pending.*']) }}"><a class="nav-link" href="{{ route('admin.seller-products-pending.index') }}">Pending Seller Products</a></li>
                          <li class="{{ setActive(['admin.review-product.*']) }}"><a class="nav-link" href="{{ route('admin.review-product.index') }}">Product Reviews</a></li>
                      </ul>
                  </li>
      
                  <li class="dropdown {{ setActive(['admin.vendor-profile.*', 'admin.flash-sale.*', 'admin.coupons.*', 'admin.shipping.*', 'admin.payment-setting.*']) }}">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-store"></i><span>Ecommerce Settings</span></a>
                      <ul class="dropdown-menu">
                          <li class="{{ setActive(['admin.vendor-profile.*']) }}"><a class="nav-link" href="{{ route('admin.vendor-profile.index') }}">Vendor Profile</a></li>
                          <li class="{{ setActive(['admin.flash-sale.*']) }}"><a class="nav-link" href="{{ route('admin.flash-sale.index') }}">Flash Sale</a></li>
                          <li class="{{ setActive(['admin.coupons.*']) }}"><a class="nav-link" href="{{ route('admin.coupons.index') }}">Coupons</a></li>
                          <li class="{{ setActive(['admin.shipping.*']) }}"><a class="nav-link" href="{{ route('admin.shipping-role.index') }}">Shipping</a></li>
                          <li class="{{ setActive(['admin.payment-setting.*']) }}"><a class="nav-link" href="{{ route('admin.payment-setting.index') }}">Payment Settings</a></li>
                      </ul>
                  </li>
      
                  <li class="dropdown {{ setActive([
                      'admin.order.*',
                      'admin.pending-orders',
                      'admin.processed-orders',
                      'admin.dropped-off-orders',
                      'admin.shipped-orders',
                      'admin.out-for-delivery-orders',
                      'admin.delivered-orders',
                      'admin.canceled-orders',
                  ]) }}">
                      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-truck"></i><span>Orders</span></a>
                      <ul class="dropdown-menu">
                          <li class="{{ setActive(['admin.order.*']) }}"><a class="nav-link" href="{{ route('admin.order.index') }}">All Orders</a></li>
                          <li class="{{ setActive(['admin.pending-orders']) }}"><a class="nav-link" href="{{ route('admin.pending-orders') }}">Pending Orders</a></li>
                          <li class="{{ setActive(['admin.processed-orders']) }}"><a class="nav-link" href="{{ route('admin.processed-orders') }}">Processed Orders</a></li>
                          <li class="{{ setActive(['admin.dropped-off-orders']) }}"><a class="nav-link" href="{{ route('admin.dropped-off-orders') }}">Dropped Off Orders</a></li>
                          <li class="{{ setActive(['admin.shipped-orders']) }}"><a class="nav-link" href="{{ route('admin.shipped-orders') }}">Shipped Orders</a></li>
                          <li class="{{ setActive(['admin.out-for-delivery-orders']) }}"><a class="nav-link" href="{{ route('admin.out-for-delivery-orders') }}">Out For Delivery Orders</a></li>
                          <li class="{{ setActive(['admin.delivered-orders']) }}"><a class="nav-link" href="{{ route('admin.delivered-orders') }}">Delivered Orders</a></li>
                          <li class="{{ setActive(['admin.canceled-orders']) }}"><a class="nav-link" href="{{ route('admin.canceled-orders') }}">Canceled Orders</a></li>
                      </ul>
                  </li>
      
                  <li class="{{ setActive(['admin.transaction']) }}">
                      <a class="nav-link" href="{{ route('admin.transaction') }}"><i class="fas fa-money-bill-wave"></i><span>Transactions</span></a>
                  </li>
      
                  <li class="dropdown {{ setActive([
                      'admin.vendor-requests.index',
                      'admin.customer.index',
                      'admin.vendor-list.index',
                      'admin.manage-user.index',
                      'admin.admin-list.index',
                  ]) }}">
                      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i><span>Users</span></a>
                      <ul class="dropdown-menu">
                          <li class="{{ setActive(['admin.vendor-requests.index']) }}"><a class="nav-link" href="{{ route('admin.vendor-requests.index') }}">Pending Vendors</a></li>
                          <li class="{{ setActive(['admin.customer.index']) }}"><a class="nav-link" href="{{ route('admin.customer.index') }}">Customers</a></li>
                          <li class="{{ setActive(['admin.vendor-list.index']) }}"><a class="nav-link" href="{{ route('admin.vendor-list.index') }}">Vendors</a></li>
                          <li class="{{ setActive(['admin.admin-list.index']) }}"><a class="nav-link" href="{{ route('admin.admin-list.index') }}">Admins</a></li>
                          <li class="{{ setActive(['admin.manage-user.index']) }}"><a class="nav-link" href="{{ route('admin.manage-user.index') }}">Manage Users</a></li>
                      </ul>
                  </li>
      
                  <li class="dropdown {{ setActive(['admin.withdraw-method.*', 'admin.withdraw.index']) }}">
                      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-wallet"></i><span>Withdraw Payments</span></a>
                      <ul class="dropdown-menu">
                          <li class="{{ setActive(['admin.withdraw-method.*']) }}"><a class="nav-link" href="{{ route('admin.withdraw-method.index') }}">Withdraw Methods</a></li>
                          <li class="{{ setActive(['admin.withdraw.index']) }}"><a class="nav-link"
                            href="{{ route('admin.withdraw.index') }}">Withdraw List</a></li>
                      </ul>
                  </li>
      
                  <li class="{{ setActive(['admin.setting.*']) }}">
                      <a class="nav-link" href="{{ route('admin.home-page-setting') }}"><i class="fas fa-cogs"></i><span>Home Page Settings</span></a>
                  </li>
      
                  <li class="{{ setActive(['admin.setting.*']) }}">
                      <a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="fas fa-cogs"></i><span>Settings</span></a>
                  </li>
      
              </ul>
          </aside>
      </div>
      