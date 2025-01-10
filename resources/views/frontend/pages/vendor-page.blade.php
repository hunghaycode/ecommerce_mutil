@extends('frontend.layouts.master')
@section('content')
    <!--============================
            BREADCRUMB START
        ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>vendors</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">vendors</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
            BREADCRUMB END
        ==============================-->


    <!--============================
          VENDORS START
        ==============================-->
    <section id="wsus__product_page" class="wsus__vendors">
        <div class="container">
            <div class="row">

@foreach ($vendors as $vendor)
           <div class="col-xl-6 col-md-6">
                    <div class="wsus__vendor_single">
                        <img src="{{asset($vendor->banner)}}" alt="vendor" class="img-fluid w-100">
                        <div class="wsus__vendor_text">
                            <div class="wsus__vendor_text_center">
                                <h4>{{$vendor->shop_name}}</h4>
                                <p class="wsus__vendor_rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </p>
                                <a href="callto:+6955548721111"><i class="far fa-phone-alt"></i>
                                    {{$vendor->phone}}</a>
                                <a href="mailto:example@gmail.com"><i class="fal fa-envelope"></i>
                                    {{$vendor->email}}</a>
                                <a href="{{route('user.vendor-page.product',$vendor->id)}}" class="common_btn">visit store</a>
                            </div>
                        </div>
                    </div>
                </div>
@endforeach
         


            </div>
        </div>
        <div class="col-xl-12">
            <section id="pagination">
                @if ($vendors->hasPages())
                {{ $vendors->links() }}
            @endif
            </section>


        </div>
    </section>
    <!--============================
           VENDORS END
        ==============================-->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.list-views').on('click', function() {
                let style = $(this).data('id');
                $.ajax({
                    method: 'GET',
                    data: {
                        style: style
                    },
                    url: "{{ route('products.list-view') }}",
                    success: function(data) {

                    }
                })

            })
        })
        @php
            if (request()->has('range') && request()->range != '') {
                $price = explode(';', request()->range);
                $from = $price[0];
                $to = $price[1];
            } else {
                $from = 0;
                $to = 10000;
            }
        @endphp
        jQuery(function() {
            jQuery("#slider_range").flatslider({
                min: 0,
                max: 10000,
                step: 100,
                values: [{{ $from }}, {{ $to }}],
                range: true,
                einheit: '{{ $settings->currency_icon }}'
            });
        });
    </script>
@endpush
