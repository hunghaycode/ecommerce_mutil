<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub-category.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories  = Category::all();
        return view('admin.sub-category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=>['required'],
            'name'=>['required','max:100','unique:categories,name'],
            'status'=>['required'],

        ]);
        $subCategory =  new SubCategory();
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->status = $request->status;
        $subCategory->slug =Str::slug( $request->name);
        $subCategory->save();
        toastr()->success('Slider Create Successfully!');

        return redirect()->route('admin.sub-category.index');

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
        $categories = Category::all();
        $subCategory= SubCategory::findOrFail($id);

    return view('admin.sub-category.edit',compact('categories','subCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category'=>['required'],
            'name'=>['required','max:100','unique:categories,name,'.$id],
            'status'=>['required'],

        ]);
        $subCategory =   SubCategory::findOrFail($id);
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->status = $request->status;
        $subCategory->slug =Str::slug( $request->name);
        $subCategory->save();
        toastr('Update Successfully' ,'success');

        return redirect()->route('admin.sub-category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $childCategory = ChildCategory::where('sub_Category_id',$subCategory->id)->count();
        if ($childCategory >0) {
          return response(['status' => 'error', 'message' => "Danh mục phụ này chứa $childCategory danh mục con  hãy xóa danh mục con này trước"]);
        }
        $subCategory->delete();
        return response(['status'=>'success','Delete SuccessFully']);
    }
    public function changeStatus(Request $request)
    {
        $category = SubCategory::findOrFail($request->id);
        $category->status = $request->status == 'true' ? 1 : 0;
        $category->save();
        return response(['message'=>'Status has been update']);

    }
}
