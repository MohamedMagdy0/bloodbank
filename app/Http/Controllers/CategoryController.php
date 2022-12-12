<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index',compact('categories'));
    } //  index


    public function create()
    {
        return view('categories.create') ;
    } //create


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|unique:categories,name' ,
        ]);

        $category = Category::create(['name'=>$request->name]);
        toastr()->success('تم حفظ البيانات بنجاح');
        return redirect()->route('categories.index');
    }  //  store


    public function show($governorate)
    {
        //
    }


    public function edit($category)
    {
        $category = Category::findOrFail($category);
        return view('categories.edit',compact('category')) ;
    }  //edit


    public function update(Request $request,$category)
    {
        $this->validate($request,[
            'name' => 'required|string' ,
        ]);

        $category = Category::FindOrFail($category)->update([
             'name' => $request->name ,
        ]);
        toastr()->warning('تم تحديث البيانات بنجاح');
        return redirect()->route('categories.index');
    } // update




    // start softDelete

    public function softDelete($id)
    {
        $category = Category::findOrFail($id)->delete();
        toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('categories.index');
    }  //  softDelete


    public function categoryTrash()
    {
        $categories = Category::onlyTrashed()->paginate(10);
        return view('categories.trash',compact('categories'));
    }  //  categoryTrash


    public function categoryRestore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();
        toastr()->warning('تم ارجاع البيانات بنجاح');
        return redirect()->route('categories.index');
    }  // categoryRestore


    public function destroy($category)
    {
        $category = Category::withTrashed()->FindOrFail($category);
        $category->forceDelete();
        toastr()->error('تم حذف البيانات بنجاح');
        return redirect()->route('categories.index');
    } //  destroy
}
