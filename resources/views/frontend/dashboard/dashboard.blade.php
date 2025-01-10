@extends('frontend.dashboard.layouts.master')
@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
     @include('frontend.dashboard.layouts.sidebar')

     <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content">
            <div class="wsus__dashboard">
              <div class="row">
                <br>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item red" href="{{route('user.orders.index')}}">
                    <i class="fas fa-cart-plus"></i>
                    <p>Total Order</p>
                    <h4>{{$totalOrder}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item green" href="dsahboard_download.html">
                    <i class="fas fa-cart-plus"></i>
                    <p>Pending Orders</p>
                    <h4>{{$pendingOrder}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item sky" href="dsahboard_review.html">
                    <i class="fas fa-cart-plus"></i>
                    <p>Complete Orders</p>
                    <h4>{{$completeOrder}}</h4>
                  </a>
                </div>
                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item blue" href="{{route('user.review.index')}}">
                    <i class="fas fa-star"></i>
                    <p>Reviews</p>
                    <h4>{{$reviews}}</h4>
                  </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-2">
                  <a class="wsus__dashboard_item purple" href="">
                    <i class="fas fa-star"></i>
                    <p>Wishlist</p>
                    <h4>-</h4>
                  </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-2">
                    <a class="wsus__dashboard_item orange" href="{{route('user.profile')}}">
                      <i class="fas fa-user-shield"></i>
                      <p>profile</p>
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