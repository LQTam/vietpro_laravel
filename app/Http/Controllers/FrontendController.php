<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use DB;
class FrontendController extends Controller
{
    public function getHome(){
        $data['featured'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
        $data['products'] = Product::orderBy('prod_id','desc')->take(8)->get();
        return view('frontend.home',$data);
    }

    public function getDetail($id){
        $data['product'] = Product::where('prod_id',$id)->get();
        $data['comments'] = Comment::where('comm_prod_id',$id)->get();
        return view('frontend.details',$data);
    }
    public function postDetail($id){

    }

    public function getCate($id){
        $data['products'] = Product::where('prod_cate',$id)->paginate(8);
        $data['cateName'] = Category::find($id);
        return view('frontend.category',$data);
    }
}
