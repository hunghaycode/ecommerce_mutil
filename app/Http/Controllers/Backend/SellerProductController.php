<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SellerProductsDataTable;
use App\DataTables\SellerProductsPendingDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SellerProductController extends Controller
{
    public function index(SellerProductsDataTable $dataTable)  {
        return $dataTable->render('admin.product.seller-product.index');
    }
    public function pendingProducts(SellerProductsPendingDataTable $dataTable)  {
        return $dataTable->render('admin.product.seller-product-pending.index');
    }

    public function changeApproveStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->is_approved = $request->value;
        $product->save();

        return response(['message' => 'Product Approve Status Has Been Changed']);
    }
}
