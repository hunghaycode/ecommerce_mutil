<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AdminReviewProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class AdminReviewProduct extends Controller
{
    public function index(AdminReviewProductDataTable $dataTable) {
        return $dataTable ->render('admin.review.index');
    }
    public function changeStatus(Request $request)
    {
        $reviewProduct = ProductReview::findOrFail($request->id);
        $reviewProduct->status = $request->status == 'true' ? 1 : 0;
        $reviewProduct->save();
        return response(['message'=>'Status has been update']);

    }
}
