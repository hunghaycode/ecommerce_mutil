<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index() {
        $flashSaleDate= FlashSale::first();
        $flashSaleItem = FlashSaleItem::where('status',1)->paginate(2);
        return view('frontend.pages.flash-sale',compact('flashSaleDate','flashSaleItem'));
    }
}
