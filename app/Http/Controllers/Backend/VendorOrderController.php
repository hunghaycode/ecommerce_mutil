<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\VendorOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class VendorOrderController extends Controller
{
    public function index(VendorOrderDataTable $dataTable)
    {
        return  $dataTable->render('vendor.order.index');
    }

    public function show(string $id)
    {
        $order = Order::with(['orderProducts'])->findOrFail($id);
        return  view('vendor.order.show', compact('order'));
    }
    public function changeOrderStatus(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = $request->status;
        $order->save();
        toastr('Change Status Successfully!', 'success');

        return redirect()->back();
    }
}
