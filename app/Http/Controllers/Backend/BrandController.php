<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\imageUploadTrait;

use Str;

class BrandController extends Controller
{
    use imageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $dataTables)
    {
        return $dataTables->render('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => ['image', 'required', 'max:2000'],
            'name' => ['required', 'max:200'],
            'is_featured' => ['required'],
            'status' => ['required'],
        ]);
        $brand = new Brand();
        $logoPath = $this->uploadImage($request, 'logo', 'uploads');
        $brand->logo = $logoPath;
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();
        toastr()->success('Brand Create Successfully!');

        return redirect()->route('admin.brand.index');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => ['image', 'max:2000'],
            'name' => ['required', 'max:200'],
            'is_featured' => ['required'],
            'status' => ['required'],
        ]);
        $brand = Brand::findOrFail($id);
        $logoPath = $this->uploadImage($request, 'logo', 'uploads', $brand->banner);
        $brand->logo = empty(!$logoPath) ? $logoPath : $brand->logo;
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();
        toastr()->success('Brand Update Successfully!');

        return redirect()->route('admin.brand.index');
    }
    public function changeStatus(Request $request)
    {
        $brand = Brand::findOrFail($request->id);
        $brand->status = $request->status == 'true' ? 1 : 0;
        $brand->save();
        return response(['message'=>'Status has been update']);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
           if (Product::where('brand_id',$brand->id)->count()>0) {
            return response(['status' => 'error', 'message' => 'Lỗi xóa ! Thương hiệu có sản phẩm liên kết']);

           }
           $this->deleteImage($brand->logo);

        $brand->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);

    }
}

