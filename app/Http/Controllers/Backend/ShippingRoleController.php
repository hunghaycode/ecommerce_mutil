<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ShippingRoleDataTable;
use App\Http\Controllers\Controller;
use App\Models\Shipping;
use App\Models\ShippingRole;
use Illuminate\Http\Request;

class ShippingRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ShippingRoleDataTable $dataTable)
    {
        return $dataTable->render('admin.shipping-role.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shipping-role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:200'],
            'type' => ['required'],
            'min_cost' => ['integer','nullable'],
            'cost' => ['required','integer'],
            'status' => ['required'],
        ]);
        $shipping = new ShippingRole();
        $shipping->name = $request->name;
        $shipping->type = $request->type;
        $shipping->min_cost = $request->min_cost;
        $shipping->cost = $request->cost;
        $shipping->status = $request->status;
        $shipping->save();
        toastr()->success('Slider Create Successfully!');

        return redirect()->route('admin.shipping-role.index');

    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shipping = ShippingRole::findOrFail($id);
        return view('admin.shipping-role.edit',compact('shipping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required','max:200'],
            'type' => ['required'],
            'min_cost' => ['integer','nullable'],
            'cost' => ['required','integer'],
            'status' => ['required'],
        ]);
        $shipping = ShippingRole::findOrFail($id);
        $shipping->name = $request->name;
        $shipping->type = $request->type;
        $shipping->min_cost = $request->min_cost;
        $shipping->cost = $request->cost;
        $shipping->status = $request->status;
        $shipping->save();
        toastr()->success('Slider Update Successfully!');

        return redirect()->route('admin.shipping-role.index');
    }
    public function changeStatus(Request $request)
    {
        $coupon = ShippingRole::findOrFail($request->id);
        $coupon->status = $request->status == 'true' ? 1 : 0;
        $coupon->save();
        return response(['message'=>'Status has been update']);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shipping = ShippingRole::findOrFail($id);
        $shipping->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);

    }
}
