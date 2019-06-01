<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use DB;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;

class ProductController extends Controller
{
    public function getProduct(){
        $data['productList'] = DB::table('vp_products')->join(
            'vp_categories',
            'vp_products.prod_cate',
            '=',
            'vp_categories.cate_id'
        )->get();
        $data['cateList'] = Category::all();
        return view('backend.product',$data);
    }

    
    public function getAddProduct(){
        $data['cateList'] = Category::all();
        return view('backend.addproduct',$data);
    }
    
    public function postAddProduct(AddProductRequest $request){
        $product = new Product;
        $imgName = $request->img->getClientOriginalName();
        $destionationPath = public_path("productImage/images");
        $product->prod_name = $request->name;
        $product->prod_slug= str_slug($request->name);
        $product->prod_price = $request->price;
        $product->prod_img = $imgName;
        $product->prod_accessories = $request->accessories;
        $product->prod_warranty = $request->warranty;
        $product->prod_promotion = $request->promotion;
        $product->prod_status = $request->status;
        $product->prod_desc = $request->description;
        $product->prod_condition = $request->condition;
        $product->prod_featured = $request->featured;
        $product->prod_cate = $request->cate;
        $product->save();
        $request->img->move($destionationPath,$imgName);
        return redirect()->intended('admin/product');
    }

    public function getEditProduct($id){
        $data['product'] = Product::find($id);
        $data['cateList'] = Category::all();
        return view('backend.editproduct',$data);
    }

    public function postEditProduct(EditProductRequest $request,$id){
        $product = new Product;
        $arr["prod_name"] = $request->name;
        $arr["prod_slug"] = str_slug($request->name);
        $arr["prod_price"] = $request->price;
        $arr["prod_accessories"] = $request->accessories;
        $arr["prod_warranty"] = $request->warranty;
        $arr["prod_promotion"] = $request->promotion;
        $arr["prod_status"] = $request->status;
        $arr["prod_desc"] = $request->description;
        $arr["prod_condition"] = $request->condition;
        $arr["prod_featured"] = $request->featured;
        $arr["prod_cate"] = $request->cate;

        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $destinationPath = public_path('productImage/images');
            $arr['prod_img'] = $img;
            $request->img->move($destinationPath,$img);
        }

        $product::where('prod_id',$id)->update($arr);

        return redirect()->intended('admin/product');
    }

    public function getDeleteProduct($id){
        Product::destroy($id);
        return back();
    }
}
