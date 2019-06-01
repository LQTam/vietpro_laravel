<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//use modelCategory
use App\Models\Category;
//use classRequest
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;

class CategoryController extends Controller
{
    public function getCate(){
        $data['cateList'] = Category::all();
        return view('backend.category',$data);
    }

    public function postCate(AddCateRequest $request){
        $category = new Category();
        $category->cate_name = $request->cate_name;
        $category->cate_slug = str_slug($request->cate_name);
        $category->save();
        return back();
    }
    public function getEditCateID($id){
        $data['cate_id'] = Category::find($id);
        return view('backend.editcategory',$data);
    }

    public function postEditCateID(EditCateRequest $request,$id){
        $category = Category::find($id);
        $category->cate_name = $request->cate_name;
        $category->cate_slug = str_slug($request->cate_name);
        $category->save();
        return redirect()->intended('admin/category');
    }
    public function getDeleteCateID($id){
        Category::destroy($id);
        return back();
    }
}
