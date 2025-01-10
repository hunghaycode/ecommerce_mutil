<header>
    @php
        $admin =\App\models\User::where('role','admin')->first();
        // @dd($admin)
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-2 col-md-1 d-lg-none">
                <div class="wsus__mobile_menu_area">
                    <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                </div>
            </div>
            <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                <div class="wsus_logo_area">
                    <a class="wsus__header_logo" href="index.html">
                        <img src="{{asset($admin->image)}}" alt="logo" style="width: 100%;height: auto;">
                    </a>
                </div>
            </div>
            <div class="col-xl-5 col-md-6 col-lg-4 d-none d-lg-block">
                <div class="wsus__search">
                    <form action="{{route('products.index')}}" method="GET">
                        <input type="text" placeholder="Search..." name="search">
                        <button type="submit"><i class="far fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-xl-5 col-3 col-md-3 col-lg-6">
                <div class="wsus__call_icon_area">
                    <div class="wsus__call_area">
                        <div class="wsus__call">
                            <i class="far fa-phone-alt" aria-hidden="true"></i>
                        </div>
                        <div class="wsus__call_text">
                            <p>Call Us Now</p>
                            <p>+569875544220</p>
                        </div>
                    </div>
                    <ul class="wsus__icon_area">
                        <li><a href="wishlist.html"><i class="fal fa-heart"></i><span>05</span></a></li>
                        <li><a href="compare.html"><i class="fal fa-random"></i><span>03</span></a></li>
                        <li><a class="wsus__cart_icon" href="#"><i class="fal fa-shopping-bag"></i><span
                                    id="cart-count">{{ Cart::content()->count() }}</span></a></li>
                                    
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="wsus__mini_cart">
        <h4>shopping cart <span class="wsus_close_mini_cart"><i class="far fa-times"></i></span></h4>
        <ul class="mini_cart_wrapper">
            @foreach (Cart::content() as $sideBarProduct)
                <li id="mini-cart_{{ $sideBarProduct->rowId }}">
                    <div class="wsus__cart_img">
                        <a href="{{ route('product-detail', $sideBarProduct->options->slug) }}"><img
                                src="{{ asset($sideBarProduct->options->image) }}" alt="product"
                                class="img-fluid w-100"></a>
                        <a class="wsis__del_icon remove_sidebar_product"  data-id="{{ $sideBarProduct->rowId }}" href="#"><i class="fas fa-minus-circle"
                               ></i></a>
                    </div>

                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title"
                            href="{{ route('product-detail', $sideBarProduct->options->slug) }}">{{ $sideBarProduct->name }}</a>
                        <p>{{ $settings->currency_icon }} {{ $sideBarProduct->price }} +<small class="text-success">({{$sideBarProduct->options->variants_total}})</small><p class="text-danger">X{{$sideBarProduct->qty}}</p></p>
                        <small>
                            @foreach($sideBarProduct->options->variants as $key =>$variant)
                                <small>{{ $key }}:{{ $variant['name'] }}({{ $settings->currency_icon }} {{ $variant['price'] }})</small>
                             
                            @endforeach
                            <br>
                        </small>
                        
                    </div>
                </li>
            @endforeach
            @if (Cart::content()->count() === 0)
                <li class="text-center">Your Shopping Cart Is Empty</li>
            @endif
        </ul>


        <div class="mini-cart-actions {{ Cart::content()->count() === 0 ? 'd-none' : '' }}">
            <h5>sub total <span class="mini-cart-sub-total">{{getCartTotal()}}</span></h5>
            <div class="wsus__minicart_btn_area">
                <a class="common_btn" href="{{ route('cart-detail') }}">view cart</a>
                <a class="common_btn" href="{{route('user.checkout')}}">checkout</a>
            </div>
        </div>
    </div>

</header>
