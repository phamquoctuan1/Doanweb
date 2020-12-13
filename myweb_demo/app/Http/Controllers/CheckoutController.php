<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

session_start();

class CheckoutController extends Controller
{

    public function checkout(Request $request)
    {
        $all_category = DB::table('category')->where('category.parent_id', '0')->orderBy('cate_id', 'asc')->get();
        $mobile_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 28)->get();
        $laptop_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 29)->get();
        $pc_brand = DB::table('brand')->join('category', 'category.cate_id', '=', 'brand.category_id')->where('category.cate_id', 30)->get();
        return view('pages.cart.check_out')->with('mobile_brand', $mobile_brand)->with('all_category', $all_category)->with('laptop_brand', $laptop_brand)->with('pc_brand', $pc_brand);
    }
    public function check_out(Request $request)
    {
        $note = $request->txtnote;
        $amount = 0;
        $qty = 0;
        $status = 0;
        $id_order = "";
        $price = 0;
        $pro_id = 0;
        $data = Auth::user()->id;
        $cart = Session('cart');
        foreach ($cart as $key => $value) {
            $amount += $value['product_qty'] * $value['product_price'];
        }
        $id_order = DB::table('order')->insertGetId(['c_id' => $data, 'amount' => $amount, 'order_status' => $status, 'note' => $note]);
        foreach ($cart as $value) {
            $price = $value['product_price'];
            $pro_id = $value['product_id'];
            $qty = $value['product_qty'];
            DB::table('orders_detail')->insert(
                [
                    'price' => $price, 'pro_id' => $pro_id,
                    'qty' => $qty,
                    'o_id' => $id_order,
                    'created_at' => NOW()
                ]
            );
        }
        Session::forget('cart');
        Session::flash('message', "Đơn hàng của bạn đã gửi đi thành công! ");
        return back();
    }
}
