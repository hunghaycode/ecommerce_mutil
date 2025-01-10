<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UserProductReviewDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductImageGallery;
use App\Models\ProductReview;
use App\Models\ProductReviewGallery;
use App\Traits\imageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    use imageUploadTrait;
    public function index(UserProductReviewDataTable $dataTable){
        return $dataTable->render('frontend.dashboard.review.index');
  
    }
    public function create(Request $request)
    {
        $request->validate([
            'rating' => ['required'],
            'review' => ['required', 'max:250'],
            'images.*' => ['image'],
        ]);
        
        $checkReviewExist = ProductReview::where(['product_id' => $request->product_id, 'user_id' => Auth::user()->id])->first();
        if($checkReviewExist){
            toastr('You already added a review for this product!', 'error', 'error');
            return redirect()->back();
        }

        // dd($request->all());
        $imagesPath = $this->uploadMultiImage($request, 'images', 'uploads');
        $productReview = new ProductReview();
        $productReview->rating = $request->rating;
        $productReview->review = $request->review;
        $productReview->product_id = $request->product_id;
        $productReview->vendor_id = $request->vendor_id;
        $productReview->user_id = Auth::user()->id;
        $productReview->status = 0;
        $productReview->save();

        if (!empty($imagesPath)) {
            foreach ($imagesPath as $path) {
                $productReviewGallery = new ProductReviewGallery();
                $productReviewGallery->product_review_id = $productReview->id;
                $productReviewGallery->image = $path;
                $productReviewGallery->save();
            }
        }
        
        
        toastr('success', 'success', 'Create Review Success');

        return redirect()->back();
    }
}
