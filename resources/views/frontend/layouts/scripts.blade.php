<script>
    $(document).ready(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.shopping-cart-form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            // console.log(formData);

            $.ajax({
                method: 'POST',
                data: formData,
                url: "{{ route('add-to-cart') }}",
                success: function(data) {
                    if (data.status == 'success') {

                        getCartCount();
                        fetchSidebarCartProducts();
                        $('.mini-cart-actions').removeClass('d-none');
                        toastr.success(data.message);
                    }
                    else if(data.status == 'error') {
                        toastr.error(data.message);
                    }



                },
                error: function(data) {

                }

            })
        })

        function getCartCount() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart-count') }}",
                success: function(data) {
                    $('#cart-count').text(data);
                    // console.log(data);
                },
                error: function(data) {

                }

            })
        }

        function fetchSidebarCartProducts() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart-products') }}",
                success: function(data) {
                    $('.mini_cart_wrapper').html('');
                    console.log(data);
                    var html = '';
                    for (let item in data) {
                        let product = data[item];
                        html += ` <li id="mini-cart_${product.rowId}">
                <div class="wsus__cart_img">
                    <a href="{{ url('product-detail') }}${product.options.slug}"><img src="{{ asset('/') }}${product.options.image}" alt="product" class="img-fluid w-100"></a>
                    <a class="wsis__del_icon remove_sidebar_product" href="#" data-id="${product.rowId}"><i class="fas fa-minus-circle"></i></a>
                </div>
                <div class="wsus__cart_text">
                    <a class="wsus__cart_title" href="{{ url('product-detail') }}${product.options.slug}">${product.name}</a>
                      <p>{{ $settings->currency_icon }} ${ product.price} +<small class="text-success">(${product.options.variants_total })</small><p class="text-danger">X${product.qty}</p></p>
                    <small>`;

                        for (var key in product.options.variants) {
                            var variant = product.options.variants[key];
                            html +=
                                `<small>${key}: ${variant.name} ({{ $settings->currency_icon }} ${variant.price}) <br></small>`;
                        }
                        html += `
                        <br>
                    </small>
                    
                </div>
            </li>`;
                    }
                    $('.mini_cart_wrapper').html(html);
                    getSidebarCartSubTotal()
                },
                error: function(data) {

                }

            })
        }

        $('body').on('click', '.remove_sidebar_product', function(e) {
            e.preventDefault();
            let rowId = $(this).data('id');
            console.log(rowId);

            $.ajax({
                method: 'POST',
                data: {
                    rowId: rowId
                },
                url: "{{ route('cart.remove-sidebar-product') }}",
                success: function(data) {
                    let productId = '#mini-cart_' + rowId;
                    $(productId).remove()
                    if ($('.mini_cart_wrapper').find('li').length === 0) {
                        $('.mini-cart-actions').addClass('d-none');
                        $('.mini_cart_wrapper').html(
                            '<li class="text-center">Your Shopping Cart Is Empty</li>');
                    }
                    getCartCount();
                    getSidebarCartSubTotal();
                    toastr.success(data.message);
                },
                error: function(data) {
                    console.log(data);

                }

            })
        })

        function getSidebarCartSubTotal() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.sidebar-product-total') }}",
                success: function(data) {
                    $('.mini-cart-sub-total').text("{{ $settings->currency_icon }}" + data)
                    console.log(data);

                    // toastr.success(data.message);
                },
                error: function(data) {
                    console.log(data);

                }

            })

        }
        simplyCountdown('.simply-countdown-one', {
            year: {{ date('Y', strtotime(@$flashSaleDate->end_date)) }},
            month: {{ date('m', strtotime(@$flashSaleDate->end_date)) }},
            day: {{ date('d', strtotime(@$flashSaleDate->end_date)) }},

        });

    })
</script>
