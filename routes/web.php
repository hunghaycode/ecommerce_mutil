<?php

use App\Http\Controllers\Backend\AdminController;

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProductReviewController;
use App\Http\Controllers\Frontend\ProductTrackController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\UserVendorReqeustController;
use App\Http\Controllers\Frontend\UserVendorRequestController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale');
Route::get('product-detail/{slug}', [FrontendProductController::class, 'index'])->name('product-detail');
Route::get('products', [FrontendProductController::class, 'productsIndex'])->name('products.index');
Route::get('products-list-view', [FrontendProductController::class, 'productsListView'])->name('products.list-view');

Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart-detail', [CartController::class, 'cartDetail'])->name('cart-detail');
Route::post('cart/update-quantity', [CartController::class, 'cartUpdateQty'])->name('cart.update-quantity');
Route::get('clear-cart', [CartController::class, 'clearCart'])->name('clear-cart');
Route::get('cart/remove-product{rowId}', [CartController::class, 'removeProduct'])->name('cart.remove-product');
Route::get('cart-count', [CartController::class, 'cartCount'])->name('cart-count');

Route::get('cart-products', [CartController::class, 'getCartProduct'])->name('cart-products');
Route::post('cart/remove-sidebar-product', [CartController::class, 'removeSidebarProduct'])->name('cart.remove-sidebar-product');
Route::get('cart/sidebar-product-total', [CartController::class, 'subTotalCartSideBar'])->name('cart.sidebar-product-total');
Route::get('coupon-apply', [CartController::class, 'couponApply'])->name('cart.coupon-apply');
Route::get('coupon-calculation', [CartController::class, 'couponCalculation'])->name('cart.coupon-calculation');


Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile'); //user.profile
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');

    Route::resource('address', UserAddressController::class);
    Route::get('checkout', [CheckOutController::class, 'index'])->name('checkout');
    Route::post('checkout/address', [CheckOutController::class, 'createAddress'])->name('checkout.address.create');
    Route::post('checkout/form-submit', [CheckOutController::class, 'submitCheckOutForm'])->name('checkout.form-submit');

    Route::get('payment', [PaymentController::class, 'index'])->name('payment');
    Route::get('paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
    Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');
   /** COD routes */
   Route::get('cod/payment', [PaymentController::class, 'payWithCod'])->name('cod.payment');

   Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');


   Route::get('orders', [UserOrderController::class, 'index'])->name('orders.index');
Route::get('orders-show/{id}', [UserOrderController::class, 'show'])->name('orders.show');

Route::post('product-review', [ ProductReviewController::class, 'create'])->name('product-review.create');
Route::get('product-review', [ ProductReviewController::class, 'index'])->name('review.index');

Route::get('vendor', [ HomeController::class, 'vendorPage'])->name('vendor-page.index');
Route::get('vendor-product/{id}', [ HomeController::class, 'vendorProduct'])->name('vendor-page.product');
Route::get('vendor-request', [UserVendorRequestController::class, 'index'])->name('vendor-request.index');
Route::post('vendor-request', [UserVendorRequestController::class, 'create'])->name('vendor-request.create');
// Oder tracker
Route::get('orders-tracking', [ProductTrackController::class, 'index'])->name('orders-tracking');



});
