@extends('vendor.layouts.master')
@section('title')
{{$settings->site_name}} || Dashboard
@endsection
@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebar')


      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content">
            <div class="wsus__dashboard ">
              <div class="row">
                <!-- Các card -->
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                    <i class="fas fa-calendar-day"></i> <!-- Today's Orders -->
                    <p>Today's Orders</p>
                    <h4>{{$todaysOrder}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item green" href="{{route('vendor.orders.index')}}">
                    <i class="fas fa-hourglass-half"></i> <!-- Pending Orders -->
                    <p>Td's Pending Orders</p>
                    <h4>{{$todaysPendingOrder}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item gold" href="{{route('vendor.orders.index')}}">
                    <i class="fas fa-list-ul"></i> <!-- Total Orders -->
                    <p>Total Orders</p>
                    <h4>{{$totalOrder}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item blue" href="{{route('vendor.orders.index')}}">
                    <i class="fas fa-tasks"></i> <!-- Total Pending Orders -->
                    <p>Total Pending Orders</p>
                    <h4>{{$totalPendingOrder}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item orange" href="{{route('vendor.orders.index')}}">
                    <i class="fas fa-check-circle"></i> <!-- Completed Orders -->
                    <p>Completed Orders</p>
                    <h4>{{$totalCompleteOrder}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item teal" href="{{route('vendor.products.index')}}">
                    <i class="fas fa-box"></i> <!-- Total Products -->
                    <p>Total Products</p>
                    <h4>{{$totalProducts}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item grey" href="javascript:;">
                    <i class="fas fa-dollar-sign"></i> <!-- Today's Earnings -->
                    <p>Todays Earnings</p>
                    <h4>{{$settings->currency_icon}}{{$todaysEarnings}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item pink" href="javascript:;">
                    <i class="fas fa-calendar-alt"></i> <!-- This Month's Earnings -->
                    <p>This Month's Earnings</p>
                    <h4>{{$settings->currency_icon}}{{$monthEarnings}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item purple" href="javascript:;">
                    <i class="fas fa-calendar-alt"></i> <!-- This Year's Earnings -->
                    <p>This Year's Earnings</p>
                    <h4>{{$settings->currency_icon}}{{$yearEarnings}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item lime" href="javascript:;">
                    <i class="fas fa-dollar-sign"></i> <!-- Total Earnings -->
                    <p>Total Earnings</p>
                    <h4>{{$settings->currency_icon}}{{$toalEarnings}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item brown" href="{{route('vendor.review.index')}}">
                    <i class="fas fa-star"></i> <!-- Total Reviews -->
                    <p>Total Reviews</p>
                    <h4>{{$totalReviews}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item cyan" href="{{route('vendor.shop-profile.index')}}">
                    <i class="fas fa-store"></i> <!-- Shop Profile -->
                    <p>Shop Profile</p>
                    <h4>-</h4>
                  </a>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

