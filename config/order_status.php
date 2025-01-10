<?php
return [

    'order_status_admin' => [
        'pending' => [
            'status' => 'Chờ xử lý',
            'details' => 'Đơn hàng của bạn đang chờ xử lý'
        ],
        'processed_and_ready_to_ship' => [
            'status' => 'Đã xử lý và sẵn sàng vận chuyển',
            'details' => 'Gói hàng của bạn đã được xử lý và sẽ sớm được gửi đến đối tác giao hàng của chúng tôi'
        ],
        'dropped_off' => [
            'status' => 'Đã gửi',
            'details' => 'Gói hàng của bạn đã được gửi bởi người bán'
        ],
        'shipped' => [
            'status' => 'Đã vận chuyển',
            'details' => 'Gói hàng của bạn đã đến cơ sở logistics của chúng tôi'
        ],
        'out_for_delivery' => [
            'status' => 'Đang giao hàng',
            'details' => 'Đối tác giao hàng của chúng tôi sẽ cố gắng giao gói hàng của bạn'
        ],
        'delivered' => [
            'status' => 'Đã giao',
            'details' => 'Đã giao hàng'
        ],
        'canceled' => [
            'status' => 'Đã hủy',
            'details' => 'Đã hủy'
        ]
    ],

    'order_status_vendor' => [
        'pending' => [
            'status' => 'Chờ xử lý',
            'details' => 'Đơn hàng của bạn đang chờ xử lý'
        ],
        'processed_and_ready_to_ship' => [
            'status' => 'Đã xử lý và sẵn sàng vận chuyển',
            'details' => 'Gói hàng của bạn đã được xử lý và sẽ sớm được gửi đến đối tác giao hàng của chúng tôi'
        ]
    ]
];

?>