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
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">cart view</a></li>
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
                                                                    CART VIEW PAGE START
                                                                ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name">
                                            product details
                                        </th>

                                        <th class="wsus__pro_select">
                                            quantity
                                        </th>

                                        <th class="wsus__pro_tk">
                                            Unit price
                                        </th>
                                        <th class="wsus__pro_tk">
                                            Total price
                                        </th>

                                        <th class="wsus__pro_icon">
                                            <a href="" class="common_btn clear_cart">clear cart</a>
                                        </th>
                                    </tr>
                                    @foreach ($cartItem as $item)
                                        <tr class="d-flex">
                                            <td class="wsus__pro_img"><img src="{{ asset($item->options->image) }}"
                                                    alt="product" class="img-fluid w-100">
                                            </td>

                                            <td class="wsus__pro_name">
                                                <p>{{ $item->name }}</p>
                                                @foreach ($item->options->variants as $key => $variant)
                                                    <span>{{ $key }}: {{ $variant['name'] }}
                                                        +{{ $variant['price'] . $settings->currency_icon }}</span>
                                                @endforeach
                                            </td>


                                            <td class="wsus__pro_select">
                                                <div class="product_qty_wrapper">
                                                    <button class="btn btn-danger product-decrement">-</button>
                                                    <input class="product-qty" data-rowid="{{ $item->rowId }}"
                                                        type="text" min="1" max="100"
                                                        value="{{ $item->qty }}" readonly />
                                                    <button class="btn btn-success product-increment">+</button>
                                                </div>
                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6>{{ $item->price . $settings->currency_icon }}</h6>
                                            </td>

                                            <td class="wsus__pro_tk">
                                                <h6 id="{{ $item->rowId }}">
                                                    {{ ($item->price + $item->options->variants_total) * $item->qty . $settings->currency_icon }}
                                                </h6>
                                            </td>
                                            <td class="wsus__pro_icon">
                                                <a href="{{ route('cart.remove-product', $item->rowId) }}"><i
                                                        class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                            @if (count($cartItem) == 0)
                                <!--============================
                                                          CART VIEW PAGE START
                                                            ==============================-->
                                <div class="col-xl-12">
                                    <div class="wsus__cart_list cart_empty p-3 p-sm-5 text-center">
                                        <p class="mb-4">your shopping cart is empty</p>
                                        <a href="{{ route('home') }}" class="common_btn"><i
                                                class="fal fa-store me-2"></i>view our
                                            product</a>
                                    </div>
                                </div>
                                <!--============================
                                                                  CART VIEW PAGE END
                                                            ==============================-->
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="sub_total">{{ $settings->currency_icon }}{{ getCartTotal() }}</span></p>
                        <p>delivery: <span>$00.00</span></p>
                        <p>discount: <span id="discount">{{ getCartDiscount() }}</span></p>
                        <p class="total"><span>total:</span> <span id="cart_total">{{ getMainCartTotal() }}</span></p>

                        <form class="coupon-form">
                            <input type="text" placeholder="Coupon Code" name="coupon_code"
                                value="{{ session()->has('coupon') ? session()->get('coupon')['coupon_code'] : '' }}">

                            <button type="submit" class="common_btn">apply</button>
                        </form>
                        <a class="common_btn mt-4 w-100 text-center" href="{{ route('user.checkout') }}">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href="product_grid_view.html"><i
                                class="fab fa-shopify"></i> go shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_2.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_3.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Cosmetics</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                                                                      CART VIEW PAGE END
                                                                ==============================-->
@endsection
@push('scripts')
    <script>
        //=======COUNTDOWN======   
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // default example
        $(document).ready(function() {
            simplyCountdown('.simply-countdown-one', {
                year: {{ date('Y', strtotime(@$flashSaleDate->end_date)) }},
                month: {{ date('m', strtotime(@$flashSaleDate->end_date)) }},
                day: {{ date('d', strtotime(@$flashSaleDate->end_date)) }},
            });



            $('.product-increment').on('click', function() {
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) + 1;
                input.val(quantity);
                let rowId = input.data('rowid');
                $.ajax({
                    url: "{{ route('cart.update-quantity') }}",
                    method: 'POST',
                    data: {
                        quantity: quantity,
                        rowId: rowId,
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            let productId = '#' + rowId;
                            // console.log(productId);
                            let totalAmount = "{{ $settings->currency_icon }}" + data
                                .product_total;
                            $(productId).text(totalAmount);
                            renderCartSubTotal();
                            couponCalculation();
                            toastr.success(data.message)
                        } else if (data.status == 'error') {
                            toastr.error(data.message)
                        }
                    },
                    error: function(data) {

                    }
                })
            })


            $('.product-decrement').on('click', function() {
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) - 1;
                if (quantity < 1) {
                    quantity = 1;
                }
                input.val(quantity);

                let rowId = input.data('rowid');
                $.ajax({
                    url: "{{ route('cart.update-quantity') }}",
                    method: 'POST',
                    data: {
                        quantity: quantity,
                        rowId: rowId,
                    },
                    success: function(data) {
                        if (data.status == 'success') {
                            let productId = '#' + rowId;
                            // console.log(productId);
                            let totalAmount = "{{ $settings->currency_icon }}" + data
                                .product_total;
                            $(productId).text(totalAmount);
                            renderCartSubTotal();
                            couponCalculation();
                            toastr.success(data.message)
                        } else if (data.status == 'error') {
                            toastr.error(data.message)
                        }
                    },
                    error: function(data) {

                    }
                })
            })

            $('.clear_cart').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You wan't clear cart!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            url: "{{ route('clear-cart') }}",
                            success: function(data) {
                                if (data.status == 'success') {
                                    window.location.reload();
                                    toastr.success(data.message)

                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'CAN DELETE',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })

                    }
                })

            })

            function renderCartSubTotal() {
                $.ajax({
                    url: "{{ route('cart.sidebar-product-total') }}",
                    method: 'GET',

                    success: function(data) {
                        $('#sub_total').text("{{ $settings->currency_icon }}" + data);
                    },
                    error: function(data) {
                        console.log(data);

                    }
                })
            }
            $('.coupon-form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('cart.coupon-apply') }}",
                    method: 'GET',
                    data: formData,

                    success: function(data) {
                        if (data.status == 'error') {
                            toastr.error(data.message)
                        } else if (data.status == 'success') {
                            couponCalculation();
                            toastr.success(data.message)
                        }
                    },
                    error: function(data) {
                        console.log(data);

                    }
                })

            })

            function couponCalculation() {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.coupon-calculation') }}",

                    success: function(data) {
                        $('#discount').text('{{ $settings->currency_icon }}' + data.discount);
                        $('#cart_total').text('{{ $settings->currency_icon }}' + data.cart_total);
                    },
                    error: function(data) {
                        console.log(data);

                    }
                })
            }
        })
    </script>
@endpush
