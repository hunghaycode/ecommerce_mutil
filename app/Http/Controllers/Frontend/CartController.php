<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

        $product = Product::findOrFail($request->product_id);
        if ($product->qty == 0) {
            return response(['status' => 'error', 'message' => 'DA het hang!']);
        } elseif ($product->qty < $request->qty) {
            return response(['status' => 'error', 'message' => 'Vượt quá số lượng trong kho!']);
        }
        $variants = [];
        $variantTotalAmount = 0;
        if ($request->has('variants_items')) {
            foreach ($request->variants_items as $item_id) {
                $variantItem = ProductVariantItem::findOrFail($item_id);
                $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
                $variantTotalAmount += $variantItem->price;
            }
        }

        // check discount
        $productPrice = 0;
        if (checkDiscount($product)) {
            $productPrice = $product->offer_price;
        } else {
            $productPrice = $product->price;
        }
        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $request->qty;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['variants_total'] = $variantTotalAmount;
        $cartData['options']['image'] = $product->thumb_image;
        $cartData['options']['slug'] = $product->slug;
        Cart::add($cartData);
        return response(['status' => 'success', 'message' => 'Add to cart Successfully!']);
    }
    public function cartDetail(Request $request)
    {
        $cartItem = Cart::content();
      
        if(count($cartItem) === 0){
            Session::forget('coupon');
            toastr('Please add some products in your cart for view the cart page', 'warning', 'Cart is empty!');
            return redirect()->route('home');
        }
        return view('frontend.pages.cart-detail', compact('cartItem'));
    }
    public function cartUpdateQty(Request $request)
    {
        $productId = Cart::get($request->rowId)->id;
        $product = Product::findOrFail($productId);
        if ($product->qty == 0) {
            return response(['status' => 'error', 'message' => 'DA het hang!']);
        } elseif ($product->qty < $request->qty) {
            return response(['status' => 'error', 'message' => 'Vượt quá số lượng trong kho!']);
        }
        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);
        return response(['status' => 'success', 'message' => 'Quantity Update Successfully!', 'product_total' => $productTotal]);
    }


    public function getProductTotal($rowId)
    {

        $product = Cart::get($rowId);
        $total =  ($product->price + $product->options->variants_total) * $product->qty;


        return $total;
    }
    public function subTotalCartSideBar()
    {
        $total = 0;
        foreach (Cart::content() as $product) {
            $total += $this->getProductTotal($product->rowId);
        }
        return $total;
    }



    public function clearCart()
    {
        Cart::destroy();
        return response(['status' => 'success', 'message' => 'Cart Clear Successfully!']);
    }
    public function removeProduct($rowId)
    {
        Cart::remove($rowId);
        toastr('Product removed succesfully!', 'success', 'Success');

        return redirect()->back();
    }
    public function cartCount()
    {
        return  Cart::content()->count();
    }
    public function getCartProduct()
    {
        return  Cart::content();
    }
    public function removeSidebarProduct(Request $request)
    {
        Cart::remove($request->rowId);
        return response(['status' => 'success', 'message' => 'Product removed successfully!']);
    }
    public function couponApply(Request $request)
    {
        if ($request->coupon_code == null) {
            return response(['status' => 'error', 'message' => 'Coupon không được để trống']);
        }
        $coupon = Coupon::where(['code' => $request->coupon_code, 'status' => 1])->first();

        if ($coupon == null) {
            return response(['status' => 'error', 'message' => 'Không có Coupon']);
        } elseif ($coupon->start_date > date('Y-m-d')) {
            return response(['status' => 'error', 'message' => 'Không có Coupon']);
        } elseif ($coupon->end_date < date('Y-m-d')) {
            return response(['status' => 'error', 'message' => 'Coupon đã hết hạn']);
        } elseif ($coupon->total_used >= $coupon->quantity) {
            return response(['status' => 'error', 'message' => 'Đã đạt giới hạn tối đa']);
        }
        if ($coupon->discount_type === 'amount') {
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'amount',
                'discount' => $coupon->discount
            ]);
        } elseif ($coupon->discount_type === 'percent') {
            Session::put('coupon', [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'discount_type' => 'percent',
                'discount' => $coupon->discount
            ]);
        }

        return response(['status' => 'success', 'message' => 'Coupon applied successfully!']);
    }
    public function couponCalculation()
    {
     
        if (Session::has('coupon')) {
            $coupon = Session::get('coupon');
            $subTotal = getCartTotal();
            if ($coupon['discount_type'] == 'amount') {
                $total = $subTotal - $coupon['discount'];
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
            } elseif ($coupon['discount_type'] == 'percent') {
                $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
                $total = $subTotal - $discount;
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
            }
        }else {
            $total = getCartTotal();
            return response(['status' => 'success', 'cart_total' => $total, 'discount' => 0]);
        }
    }
}
