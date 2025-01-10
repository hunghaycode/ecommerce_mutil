
<?php

use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PaypalSettingController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminListController;
use App\Http\Controllers\Backend\AdminReviewProduct;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CodSettingController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerListController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\ManageUserController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SellerProductPendingController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRoleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\VendorListController;
use App\Http\Controllers\Backend\VendorRequestController;
use App\Http\Controllers\Backend\WithdrawController;
use App\Http\Controllers\Backend\WithdrawMehtodController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('profile',[ProfileController::class,'index'])->name('profile');

Route::post('profile/update',[ProfileController::class,'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');
Route::resource('slider',SliderController::class);

Route::put('change-status',[CategoryController::class,'changeStatus'])->name('category.change-status');
Route::resource('category',CategoryController::class);

Route::put('sub-category/change-status',[SubCategoryController::class,'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category',SubCategoryController::class);

Route::put('child-category/change-status',[ChildCategoryController::class,'changeStatus'])->name('child-category.change-status');
Route::resource('child-category',ChildCategoryController::class);
Route::get('get-subcategories',[ChildCategoryController::class,'getSubCategories'])->name('get-subcategories');

Route::put('brand/change-status',[BrandController::class,'changeStatus'])->name('brand.change-status');
Route::resource('brand',BrandController::class);

Route::resource('vendor-profile',AdminVendorProfileController::class);


Route::get('product/get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories', [ProductController::class, 'getChildCategories'])->name('product.get-child-categories');

Route::resource('products', ProductController::class);
Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('products-image-gallery',ProductImageGalleryController ::class);

Route::put('products-variant/change-status',[ProductVariantController::class,'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant',ProductVariantController ::class);
Route::get('products-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('products-variant-item.create');
Route::post('products-variant-item', [ProductVariantItemController::class, 'store'])->name('products-variant-item.store');
Route::get('products-variant-item-edit/{variantItemId}', [ProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}', [ProductVariantItemController::class, 'update'])->name('products-variant-item.update');
Route::delete('products-variant-item/{id}', [ProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');

Route::put('products-variant-item-status', [ProductVariantItemController::class, 'changeStatus'])->name('products-variant-item.change-status');



Route::get('seller-products', [SellerProductController::class, 'index'])->name('seller-products.index');
Route::get('seller-products-pending', [SellerProductController::class, 'pendingProducts'])->name('seller-products-pending.index');
Route::put('change-approve-status', [SellerProductController::class, 'changeApproveStatus'])->name('change-approve-status');


Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale', [FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product', [FlashSaleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change', [FlashSaleController::class, 'changeShowHomeStatus'])->name('flash-sale.show-at-home.status-change');
Route::put('flash-sale-status', [FlashSaleController::class, 'changeStatus'])->name('flash-sale-status');
Route::delete('flash-sale-item/{id}', [FlashSaleController::class, 'destroy'])->name('flash-sale-item.destroy');

Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
Route::put('genera-setting-update', [SettingController::class, 'generaSettingUpdate'])->name('genera-setting-update');

/** Coupon Routes */
Route::put('coupons/change-status', [CouponController::class, 'changeStatus'])->name('coupons.change-status');
Route::resource('coupons',CouponController ::class);

/** Shipping Routes */
Route::put('shipping-role/change-status', [ShippingRoleController::class, 'changeStatus'])->name('shipping-role.change-status');
Route::resource('shipping-role',ShippingRoleController ::class);


Route::get('payment-setting', [PaymentSettingController::class, 'index'])->name('payment-setting.index');
Route::resource('paypal-setting',PaypalSettingController ::class);

Route::put('cod-setting/{id}', [CodSettingController::class, 'update'])->name('cod-setting.update');

//  Order route
Route::get('order-status', [OrderController::class, 'changeOrderStatus'])->name('order.status');
Route::get('payment-status', [OrderController::class, 'changePaymentStatus'])->name('payment.status');
Route::resource('order',OrderController ::class);

Route::get('pending-orders', [OrderController::class, 'pendingOrders'])->name('pending-orders');
Route::get('processed-orders', [OrderController::class, 'processedOrders'])->name('processed-orders');
Route::get('dropped-off-orders', [OrderController::class, 'droppedOfOrders'])->name('dropped-off-orders');
Route::get('shipped-orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');
Route::get('out-for-delivery-orders', [OrderController::class, 'outForDeliveryOrders'])->name('out-for-delivery-orders');
Route::get('delivered-orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');
Route::get('canceled-orders', [OrderController::class, 'canceledOrders'])->name('canceled-orders');

Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');

Route::get('home-page-setting', [HomePageSettingController::class, 'index'])->name('home-page-setting');

Route::put('popular-category-section', [HomePageSettingController::class, 'updatePopularCategorySection'])->name('popular-category-section');
Route::put('product-slider-section-one', [HomePageSettingController::class, 'updateProductSliderSectionOn'])->name('product-slider-section-one');
Route::put('product-slider-section-two', [HomePageSettingController::class, 'updateProductSliderSectionTwo'])->name('product-slider-section-two');
Route::put('product-slider-section-three', [HomePageSettingController::class, 'updateProductSliderSectionThree'])->name('product-slider-section-three');

Route::get('review-product', [AdminReviewProduct::class, 'index'])->name('review-product.index');
Route::put('review-product/change-status', [AdminReviewProduct::class, 'changeStatus'])->name('review-product.change-status');


/** Vendor request routes */
Route::get('vendor-requests', [VendorRequestController::class, 'index'])->name('vendor-requests.index');
Route::get('vendor-requests/{id}/show', [VendorRequestController::class, 'show'])->name('vendor-requests.show');
Route::put('vendor-requests/{id}/change-status', [VendorRequestController::class, 'changeStatus'])->name('vendor-requests.change-status');

/** coustomer list routes */
Route::get('customer', [CustomerListController::class, 'index'])->name('customer.index');
Route::put('customer/status-change', [CustomerListController::class, 'changeStatus'])->name('customer.status-change');
/** coustomer list routes */
Route::get('admin-list', [AdminListController::class, 'index'])->name('admin-list.index');
Route::put('admin-list/status-change', [AdminListController::class, 'changeStatus'])->name('admin-list.status-change');
Route::delete('admin-list/{id}', [AdminListController::class, 'destroy'])->name('admin-list.destroy');


/** manage user routes */
Route::get('manage-user', [ManageUserController::class, 'index'])->name('manage-user.index');
Route::post('manage-user', [ManageUserController::class, 'create'])->name('manage-user.create');

Route::get('vendor-list', [VendorListController::class, 'index'])->name('vendor-list.index');
Route::put('vendor-list/status-change', [VendorListController::class, 'changeStatus'])->name('vendor-list.status-change');



/** Withdraw method route */
Route::resource('withdraw-method', WithdrawMehtodController::class);
Route::get('withdraw', [WithdrawController::class, 'index'])->name('withdraw.index');
Route::get('withdraw/{id}', [WithdrawController::class, 'show'])->name('withdraw.show');
Route::put('withdraw/{id}', [WithdrawController::class, 'update'])->name('withdraw.update');