@extends('frontend.layouts.master')
@section('content')
<style>





.rating {
    display: flex;
    cursor: pointer;
}

.rating .fa-stars {
    font-size: 24px;
    color: #ccc; /* Màu của sao chưa được chọn */
    transition: color 0.3s;
}

.rating .fa-stars.selected,
.rating .fa-stars:hover,
.rating .fa-stars:hover ~ .fa-star {
    color: #f5b301; /* Màu của sao khi chọn */
}

.rating .fa-star:hover ~ .fa-stars {
    color: #ccc; /* Màu của các sao phía sau khi hover lên sao hiện tại */
}


</style>

    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>product details</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">product details</a></li>
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
                                                        PRODUCT DETAILS START
                                                    ==============================-->
    <section id="wsus__product_details">
        <div class="container">
            <div class="wsus__details_bg">
                <div class="row">
                    <div class="col-xl-4 col-md-5 col-lg-5" style=" z-index: 10;">
                        <div id="sticky_pro_zoom">
                            <div class="exzoom hidden" id="exzoom">
                                <div class="exzoom_img_box">
                                    @if ($product->video_link)
                                        <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                            href="{{ $product->video_link }}">
                                            <i class="fas fa-play"></i>
                                        </a>
                                    @endif

                                    <ul class='exzoom_img_ul'>
                                        <li><img class="zoom ing-fluid w-100" src="{{ asset($product->thumb_image) }}"
                                                alt="product"></li>
                                        @foreach ($product->productImageGalleries as $productImage)
                                            <li><img class="zoom ing-fluid w-100" src="{{ asset($productImage->image) }}"
                                                    alt="product"></li>
                                        @endforeach


                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> <i
                                            class="far fa-chevron-left"></i> </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> <i
                                            class="far fa-chevron-right"></i> </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-7 col-lg-7">
                        <div class="wsus__pro_details_text">
                            <a class="title" href="#">{{ $product->name }}</a>
                            @if ($product->qty > 0)
                                <p class="wsus__stock_area"><span class="in_stock">in stock</span> ({{ $product->qty }}
                                    item)</p>
                            @elseif ($product->qty === 0)
                                <p class="wsus__stock_area"><span style="font-size: 14px;padding: 7px"
                                        class="badge bg-secondary">Product Stock Out</span> ({{ $product->qty }} item)</p>
                            @endif
                            @if (checkDiscount($product))
                                <h4>{{ $settings->currency_icon }}
                                    {{ $product->offer_price }}<del>{{ $settings->currency_icon }}
                                        {{ $product->price }}</del></h4>
                            @endif
                            <p class="review">
                                @php
                                $avgRating = $product->reviews()->avg('rating');
                                $rating = round($avgRating);
                            @endphp
    
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $rating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
    
                            {{-- <i class="fas fa-star-half-alt"></i> --}}
                            <span>({{ count($product->reviews) }} review)</span>
                            </p>
                            <div class="wsus_pro_hot_deals">
                                <h5>offer ending time : </h5>
                                <div class="simply-countdown simply-countdown-two"></div>

                            </div>
                            <p class="description">{{ $product->short_description }}</p>


                            <form action="" class="shopping-cart-form">
                                <div class="wsus__selectbox">
                                    <div class="row">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        @foreach ($product->variants as $variant)
                                            @if ($variant->status != 0)
                                                <div class="col-xl-6 col-sm-6">
                                                    <h5 class="mb-2">{{ $variant->name }}:</h5>
                                                    <select class="select_2" name="variants_items[]">
                                                        @foreach ($variant->productVariantItem as $variantItem)
                                                            @if ($variantItem->status != 0)
                                                                <option value="{{ $variantItem->id }}"
                                                                    {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                                    {{ $variantItem->name }} (${{ $variantItem->price }})
                                                                </option>
                                                            @endif
                                                        @endforeach

                                                    </select>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="wsus__quentity">
                                    <h5>quentity :</h5>
                                    <div class="select_number">
                                        <input class="number_area" type="text" min="1" max="100"
                                            value="1" name="qty" />
                                    </div>

                                </div>

                                <ul class="wsus__button_area">
                                    <li><button type="submit" class="add_cart" href="#">add to cart</button></li>
                                   
                                    {{-- <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a></li> --}}
                                </ul>
                            </form>
                            <p class="brand_model"><span>brand :</span> {{ $product->brand->name }}</p>
                           
                            {{-- <a class="wsus__pro_report" href="#" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i class="fal fa-comment-alt-smile"></i> Report incorrect
                                product information.</a> --}}
                        </div>
                    </div>
                 
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__pro_det_description">
                        <div class="wsus__details_bg">
                            <ul class="nav nav-pills mb-3" id="pills-tab3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab7" data-bs-toggle="pill"
                                        data-bs-target="#pills-home22" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Description</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Vendor Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab2" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact2" type="button" role="tab"
                                        aria-controls="pills-contact2" aria-selected="false">Reviews</button>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent4">
                                <div class="tab-pane fade  show active " id="pills-home22" role="tabpanel"
                                    aria-labelledby="pills-home-tab7">
                                    <div class="row">
                                        {!! $product->long_description !!}

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="wsus__pro_det_vendor">
                                        <div class="row">
                                            <div class="col-xl-6 col-xxl-5 col-md-6">
                                                <div class="wsus__vebdor_img">
                                                    <img src="{{ asset($product->vendor->banner) }}" alt="vensor"
                                                        class="img-fluid w-100">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-xxl-7 col-md-6 mt-4 mt-md-0">
                                                <div class="wsus__pro_det_vendor_text">
                                                    <h4>{{ $product->vendor->user->name }}</h4>
                                                    <p class="rating">
                                                        @php
                                                        $avgRating = $product->reviews()->where('status',1)->avg('rating');
                                                        $fullRating = round($avgRating);
                                                        @endphp

                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $fullRating)
                                                            <i class="fas fa-star"></i>
                                                            @else
                                                            <i class="far fa-star"></i>
                                                            @endif
                                                        @endfor

                                                        <span>({{count($product->reviews->where('status',1))}} review)</span>
                                                    </p>
                                                    <p><span>Store Name:</span> {{ $product->vendor->shop_name }}</p>
                                                    <p><span>Address:</span> {{ $product->vendor->address }}</p>
                                                    <p><span>Phone:</span> {{ $product->vendor->phone }}</p>
                                                    <p><span>mail:</span> {{ $product->vendor->email }}</p>
                                                    <a href="{{route('user.vendor-page.product',$product->vendor->id)}}" class="see_btn">visit store</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="wsus__vendor_details">
                                                    <p>{!! $product->vendor->description !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact2" role="tabpanel"
                                    aria-labelledby="pills-contact-tab2">
                                    <div class="wsus__pro_det_review">
                                        <div class="wsus__pro_det_review_single">
                                            <div class="row">
                                                <div class="col-xl-8 col-lg-7">
                                                    <div class="wsus__comment_area">
                                                        <h4>Reviews <span>{{count($reviews)}}</span></h4>
                                                        <div class="wsus__main_comment">
                                                            @foreach ($reviews as $review)
                                                                         <div class="wsus__comment_img">
                                                                <img src="{{asset($review->user->image)}}" alt="user"
                                                                    class="img-fluid w-100">
                                                            </div>
                                                            <div class="wsus__comment_text reply">
                                                                <h6>{{$review->user->name}} <span>{{$review->rating}}  <i
                                                                            class="fas fa-star"></i></span></h6>
                                                                <span> {{date('d M Y',strtotime($review->created_at))}}</span>
                                                                <p>{{$review->review}}
                                                                </p>
                                                                <ul class="">
                                                                    @if (count($review->productReviewGallery)>0)
                                                                    @foreach ($review->productReviewGallery as $image)
                                                                        <li><img src="{{asset( $image->image)}}" alt="product"
                                                                            class="img-fluid w-100"></li>
                                                                    @endforeach
                                                                        
                                                                    @endif
                                                                    
                                                                   
                                                                </ul>
                                                                {{-- <a href="#" data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapsetwo">reply</a>
                                                                <div class="accordion accordion-flush"
                                                                    id="accordionFlushExample2">
                                                                    <div class="accordion-item">
                                                                        <div id="flush-collapsetwo"
                                                                            class="accordion-collapse collapse"
                                                                            aria-labelledby="flush-collapsetwo"
                                                                            data-bs-parent="#accordionFlushExample">
                                                                            <div class="accordion-body">
                                                                                <form>
                                                                                    <div
                                                                                        class="wsus__riv_edit_single text_area">
                                                                                        <i class="far fa-edit"></i>
                                                                                        <textarea cols="3" rows="1" placeholder="Your Text"></textarea>
                                                                                    </div>
                                                                                    <button type="submit"
                                                                                        class="common_btn">submit</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                            @endforeach
                                                   
                                                        </div>

                                                        <div style="display: flex; justify-content: center;">
                                                            <div>
                                                                @if ($reviews->hasPages())
                                                                    {{ $reviews->links() }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-5 mt-4 mt-lg-0">
                                                    @auth

                                                    @php
                                                    $isBrought = false;
                                                    $orders = \App\Models\Order::where(['user_id' => auth()->user()->id, 'order_status' => 'delivered'])->get();
                                                    foreach ($orders as $key => $order) {
                                                       $existItem = $order->orderProducts()->where('product_id', $product->id)->first();

                                                       if($existItem){
                                                        $isBrought = true;
                                                       }
                                                    }

                                                @endphp

                                                    @if ($isBrought === true)
                                                        <div class="wsus__post_comment rev_mar" id="sticky_sidebar3">
                                                            <h4>write a Review</h4>
                                                            <form action="{{ route('user.product-review.create') }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-xl-12 mb-4">
                                                                        <div class="wsus__single_com">
                                                                            {{-- <select name="rating" id="" class="form-control">
                                                                                <option value="">Select</option>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                            </select> --}}
                                                                      
                                                                                <p class="rating">
                                                                                    <span>select your rating:</span>
                                                                                    <i class="fas fa-stars" data-value="1"></i>
                                                                                    <i class="fas fa-stars" data-value="2"></i>
                                                                                    <i class="fas fa-stars" data-value="3"></i>
                                                                                    <i class="fas fa-stars" data-value="4"></i>
                                                                                    <i class="fas fa-stars" data-value="5"></i>
                                                                                </p>
                                                                                <input type="hidden" name="rating" id="rating-value" value="">
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="product_id" value="{{$product->id}}" id="">
                                                                    <input type="hidden" name="vendor_id" value="{{$product->vendor_id}}" id="">

                                                                    <div class="col-xl-12">
                                                                        <div class="col-xl-12">
                                                                            <div class="wsus__single_com">
                                                                                <textarea cols="3" rows="3" placeholder="Write your review" name="review"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="img_upload">
                                                                    <div class="gallery">
                                                                        <input type="file" name="images[]" multiple>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <button class="common_btn" type="submit">submit
                                                                    review</button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                    @endauth

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {
    $('.rating .fa-stars').on('click', function() {
        var value = $(this).data('value');
        $('#rating-value').val(value);

        // Cập nhật giao diện sao
        $('.rating .fa-stars').each(function() {
            if ($(this).data('value') <= value) {
                $(this).addClass('selected');
            } else {
                $(this).removeClass('selected');
            }
        });
    });
});

        </script>
    @endpush
    <!--============================
                                                        PRODUCT DETAILS END
                                                    ==============================-->


    <!--============================
                                                        RELATED PRODUCT START
                                                    ==============================-->
    {{-- <section id="wsus__flash_sell">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__section_header">
                        <h3>Related Product</h3>
                        <a class="see_btn" href="#">see more <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row flash_sell_slider">
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/pro3.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/pro3_3.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">Electronics </a>
                            <p class="wsus__pro_rating">
                               
                               
                               
                               
                                <i class="fas fa-star-half-alt"></i>
                                <span>(133 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">hp 24" FHD monitore</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/pro4.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/pro4_4.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                               
                               
                               
                               
                                <i class="fas fa-star-half-alt"></i>
                                <span>(17 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's casual fashion watch</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/pro9.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/pro9_9.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                               
                               
                               
                               
                                <i class="fas fa-star-half-alt"></i>
                                <span>(120 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's fashion sholder bag</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/pro2.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/pro2_2.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                               
                               
                               
                               
                                <i class="fas fa-star-half-alt"></i>
                                <span>(72 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's casual shoes</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__minus">-20%</span>
                        <a class="wsus__pro_link" href="product_details.html">
                            <img src="images/pro4.jpg" alt="product" class="img-fluid w-100 img_1" />
                            <img src="images/pro4_4.jpg" alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">fashion </a>
                            <p class="wsus__pro_rating">
                               
                               
                               
                               
                                <i class="fas fa-star-half-alt"></i>
                                <span>(17 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">men's casual fashion watch</a>
                            <p class="wsus__price">$159 <del>$200</del></p>
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
    <!--============================
                                                        RELATED PRODUCT END
                                                    ==============================-->
@endsection
@push('scripts')
    <script>
        //=======COUNTDOWN======   

        // default example
        $(document).ready(function() {
            simplyCountdown('.simply-countdown-two', {
                year: {{ date('Y', strtotime(@$product->offer_end_date)) }},
                month: {{ date('m', strtotime(@$product->offer_end_date)) }},
                day: {{ date('d', strtotime(@$product->offer_end_date)) }},
            });
        })
    </script>
@endpush
