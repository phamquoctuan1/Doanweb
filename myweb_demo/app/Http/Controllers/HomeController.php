<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $all_category = DB::table('category')->where('category.parent_id', '0')->orderBy('cate_id', 'asc')->get();
        $mobile_brand = DB::table('brand')->join('category','category.cate_id','=','brand.category_id')->where('category.cate_id',28)->get();
        $laptop_brand = DB::table('brand')->join('category','category.cate_id','=','brand.category_id')->where('category.cate_id',29)->get();
        $pc_brand = DB::table('brand')->join('category','category.cate_id','=','brand.category_id')->where('category.cate_id',30)->get();
        $mobile = DB::table('products')
            ->join('category', 'products.cat_id', '=', 'category.cate_id')
            ->join('brand', 'brand.brand_id', '=', 'products.brand_id')
            ->where('category.cate_id', '=', '28')
            ->select('products.*')
            ->paginate();
        $laptop = DB::table('products')
            ->join('category', 'products.cat_id', '=', 'category.cate_id')
            ->join('brand', 'brand.brand_id', '=', 'products.brand_id')
            ->where('products.cat_id', '=', '29')
            ->select('products.*')
            ->paginate(3);
        $pc = DB::table('products')
            ->join('category', 'products.cat_id', '=', 'category.cate_id')

            ->where('category.cate_id', '=', '30')
            ->select('products.*')
            ->paginate(3);
        return view('pages.home')->with('mobile_brand', $mobile_brand)->with('all_category', $all_category)->with('mobile', $mobile)->with('laptop', $laptop)->with('pc', $pc)->with('laptop_brand', $laptop_brand)->with('pc_brand', $pc_brand);
    }
}
