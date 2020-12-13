<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

session_start();


class PagesController extends Controller
{
    public function category_child($id)
    {
        $all_category = DB::table('category')->where('category.parent_id', '0')->orderBy('cate_id', 'asc')->get();
        $mobile_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 28)->get();
        $laptop_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 29)->get();
        $pc_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 30)->get();
        $mobile = DB::table('products')
            ->join('category', 'products.cat_id', '=', 'category.cate_id')
            ->where('category.cate_slug', '=', $id)
            ->select('products.*')
            ->paginate(6);
        return view('pages.pages')->with('all_category', $all_category)->with('mobile_brand', $mobile_brand)->with('mobile', $mobile)->with('laptop_brand', $laptop_brand)->with('pc_brand', $pc_brand);
    }
    public function mobile_brand($slug)
    {
        $all_category = DB::table('category')->where('category.parent_id', '0')->orderBy('cate_id', 'asc')->get();
        $mobile_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 28)->get();
        $laptop_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 29)->get();
        $pc_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 30)->get();
        $brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 28)->get();
        $mobile = DB::table('products')
            ->join('brand', 'products.brand_id', '=', 'brand.brand_id')
            ->where('brand.slug', '=', $slug)
            ->select('products.*')
            ->paginate(6);

        return view('pages.pages')->with('all_category', $all_category)->with('brand', $brand)->with('mobile_brand', $mobile_brand)->with('mobile', $mobile)->with('laptop_brand', $laptop_brand)->with('pc_brand', $pc_brand);
    }
    public function laptop_brand($slug)
    {
        $all_category = DB::table('category')->where('category.parent_id', '0')->orderBy('cate_id', 'asc')->get();
        $mobile_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 28)->get();
        $laptop_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 29)->get();
        $pc_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 30)->get();
        $brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 29)->get();
        $mobile = DB::table('products')
            ->join('brand', 'products.brand_id', '=', 'brand.brand_id')
            ->where('brand.slug', '=', $slug)
            ->select('products.*')
            ->paginate(6);

        return view('pages.pages')->with('all_category', $all_category)->with('brand', $brand)->with('mobile_brand', $mobile_brand)->with('mobile', $mobile)->with('laptop_brand', $laptop_brand)->with('pc_brand', $pc_brand);
    }
    public function pc_brand($slug)
    {
        $all_category = DB::table('category')->where('category.parent_id', '0')->orderBy('cate_id', 'asc')->get();
        $mobile_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 28)->get();
        $laptop_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 29)->get();
        $pc_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 30)->get();
        $brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 30)->get();
        $mobile = DB::table('products')
            ->join('brand', 'products.brand_id', '=', 'brand.brand_id')
            ->where('brand.slug', '=', $slug)
            ->select('products.*')
            ->paginate(6);

        return view('pages.pages')->with('all_category', $all_category)->with('brand', $brand)->with('mobile_brand', $mobile_brand)->with('mobile', $mobile)->with('laptop_brand', $laptop_brand)->with('pc_brand', $pc_brand);
    }

    public function pro_details($id)
    {
        $mobile_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 28)->get();
        $laptop_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 29)->get();
        $pc_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 30)->get();
        $mobile_details = DB::table('products')
            ->join('category', 'products.cat_id', '=', 'category.cate_id')
            ->join('pro_details', 'pro_details.pro_id', '=', 'products.pro_id')
            ->where('products.pro_id', '=', $id)
            ->select('category.*', 'products.*', 'pro_details.cpu', 'pro_details.ram', 'pro_details.screen', 'pro_details.vga', 'pro_details.storage', 'pro_details.exten_memmory', 'pro_details.cam1', 'pro_details.cam2', 'pro_details.sim', 'pro_details.connect', 'pro_details.pin', 'pro_details.os')
            ->paginate(6);
        $all_category = DB::table('category')->where('category.parent_id', '0')->orderBy('cate_id', 'asc')->get();
        return view('pages.products.pro_details')->with('laptop_brand',$laptop_brand)->with('pc_brand',$pc_brand)->with('mobile_brand',$mobile_brand)->with('mobile_details', $mobile_details)->with('all_category', $all_category);
    }
    public function search(Request $request)
    {
        $all_category = DB::table('category')->where('category.parent_id', '0')->orderBy('cate_id', 'asc')->get();
        $mobile_brand = DB::table('brand')->join('category','category.cate_id','=','brand.category_id')->where('category.cate_id',28)->get();
        $laptop_brand = DB::table('brand')->join('category','category.cate_id','=','brand.category_id')->where('category.cate_id',29)->get();
        $pc_brand = DB::table('brand')->join('category','category.cate_id','=','brand.category_id')->where('category.cate_id',30)->get();
       $data = $request->search;
       $search = DB::table('products')->where('pro_name','like','%'.$data.'%')->get();

        return view('pages.search')->with('search', $search)->with('laptop_brand',$laptop_brand)->with('pc_brand',$pc_brand)->with('mobile_brand',$mobile_brand)->with('all_category', $all_category);;

    }
}
