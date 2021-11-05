<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Intervention\Image\ImageManagerStatic as Image;

class AdminCategoryController extends Controller
{
    //CATEGORY
    public function categoryView(){
        $categories = Category::latest()->get();
        return view('admin.category_view', compact('categories'));
    }
    public function categoryAdd(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required'
        ]);
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_name_hin),
            'category_icon' => $request->category_icon
        ]);
        $notification = array(
            'message' => 'Category Inserted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function categoryEdit($id){
        $category = Category::FindOrFail($id);
        return view('admin.category_edit', compact('category'));
    }
    public function categoryUpdate(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required'
        ]);
        $category_id = $request->id;
        Category::FindOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_name_hin),
            'category_icon' => $request->category_icon
        ]);
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.category')->with($notification);
    }
    public function categoryDelete($id){
        $category = Category::FindOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    //SUBCATEGORY
    public function subcategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = Subcategory::latest()->get();
        return view('admin.subcategory_view', compact('subcategories', 'categories'));
    }
    public function subcategoryAdd(Request $request){
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
            'category_id' => 'required'
        ],[
            'category_id.required' => 'Please Select a Category'
        ]);
        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '-', $request->subcategory_slug_hin)
        ]);
        $notification = array(
            'message' => 'Subcategory Inserted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function subcategoryEdit($id){
        $categories = Category::latest()->orderBy('category_name_en', 'ASC')->get();
        $subcategory = Subcategory::FindOrFail($id);
        return view('admin.subcategory_edit', compact('subcategory', 'categories'));
    }
    public function subcategoryUpdate(Request $request){
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
            'category_id' => 'required'
        ]);
        $subcategory_id = $request->id;
        Subcategory::FindOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '-', $request->subcategory_name_hin)         
        ]);
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.subcategory')->with($notification);
    }
    public function subcategoryDelete($id){
        $subcategory = Subcategory::FindOrFail($id)->delete();
        $notification = array(
            'message' => 'Subcategory Deleted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    //SUB SUBCATEGORY
    public function subsubcategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sub_subcategories = SubSubcategory::latest()->get();
        return view('admin.sub_subcategory_view', compact('sub_subcategories', 'categories'));
    }
    public function getSubcategory($category_id){
        $subcat = Subcategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcat);
    }
    public function subsubcategoryAdd(Request $request){
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required'
        ],[
            'category_id.required' => 'Please Select a Category'
        ]);
        SubSubcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '-', $request->subsubcategory_name_hin)
        ]);
        $notification = array(
            'message' => 'Sub Subcategory Inserted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function subsubcategoryEdit($id){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = Subcategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategory = SubSubcategory::findOrFail($id);
        return view('admin.sub_subcategory_edit', compact('subsubcategory', 'categories', 'subcategories'));
    }
    public function subsubcategoryUpdate(Request $request){
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required'
        ]);
        $subsubcat_id = $request->id;
        SubSubcategory::Find($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '-', $request->subsubcategory_name_hin)
        ]);
        $notification = array(
            'message' => 'Sub Subcategory Updated Successfully!',
            'alert-type' => 'info'
        );
        return Redirect()->route('all.subsubcategory')->with($notification);
    }
    public function subsubcategoryDelete($id){
        $subsubcat = SubSubcategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub Subcategory Deleted Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
