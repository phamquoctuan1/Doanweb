<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

session_start();
class CartController extends Controller
{
    public function add_cart_ajax(Request $request)
    {

        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if (isset($cart)) {
            $is_vaiable = 0;
            foreach ($cart as $key =>  $item) {
                if($item['product_id']==$data['cart_product_id']){
                    $is_vaiable++;
                }

            }
            if($is_vaiable==0){
                $cart[] = array(

                    'session_id'=>$session_id,
                    'product_id'=>$data['cart_product_id'],
                    'product_name'=>$data['cart_product_name'],
                    'product_images'=>$data['cart_product_images'],
                    'product_price'=>$data['cart_product_price'],
                    'product_qty'=>$data['cart_product_qty'],
                );
                Session::put('cart', $cart);
            }

        } else {
            $cart[] = array(
                'session_id'=>$session_id,
                'product_id'=>$data['cart_product_id'],
                'product_name'=>$data['cart_product_name'],
                'product_images'=>$data['cart_product_images'],
                'product_price'=>$data['cart_product_price'],
                'product_qty'=>$data['cart_product_qty'],
            );
        }
        Session::put('cart',$cart);

    }
    public function delete_cart($session_id)
    {
        $cart = Session::get('cart');

        if(isset($cart)){
            foreach($cart as $key => $value){
                if($value['session_id']==$session_id){
                    unset($cart[$key]);
                }

            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message','Xóa thành công');
        }

    }
    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if(isset($cart)){
            foreach ($data['cart_qty'] as $key => $qty) {
              foreach ($cart as $session => $value){
                  if($value['session_id']==$key)
                  {
                      $cart[$session]['product_qty'] =$qty;
                  }
              }

            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message','Cập nhật số lượng thành công');
        }
    }
    public function delete_all_cart()
    {
        $cart = Session::get('cart');
        if(isset($cart))
        {
            Session::forget('cart');
            return redirect()->back()->with('message','Xóa giỏ hàng thành công');
        }

    }
    public function cart(Request $request)
    {
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng Ajax";
        $meta_tile = "Giỏ hàng Ajax";
        $url_canonical = $request->url();
        $all_category = DB::table('category')->where('category.parent_id', '0')->orderBy('cate_id', 'asc')->get();
        $mobile_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 28)->get();
        $laptop_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 29)->get();
        $pc_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 30)->get();

        return view('pages.cart.cart_ajax')->with('url_canonical', $url_canonical)->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_tile', $meta_tile)->with('mobile_brand', $mobile_brand)->with('all_category', $all_category)->with('laptop_brand', $laptop_brand)->with('pc_brand', $pc_brand);
    }

}
