<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
session_start();
class OrderController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if(isset($admin_id)){
            return redirect('dashboard');
        }
        else{
            return redirect('admin')->send();
        }
    }
     public function all_order()
     {
        $this->AuthLogin();
        $order = DB::table('order')->join('users', 'order.c_id','=','users.id')->get();
         return view('admin.all_order')->with('order',$order);
     }

    public function active($id)
    {
        $this->AuthLogin();
        DB::table('order')->where('order_id',$id)->update(['order_status'=>1]);
        return redirect('all-order');
    }
    public function delete_order($id)
    {
        $this->AuthLogin();
        DB::table('order')->where('order_id', $id)->delete();
        Session::put('message', 'Hủy đơn hàng thành công');
        return redirect('all-order');
    }
    public function detail_order($order_id)
    {
        $this->AuthLogin();
        $detail_order = DB::table('orders_detail')->join('products','orders_detail.pro_id','products.pro_id')->where('o_id', $order_id)->get();
        return view('admin.all_order_detail', compact('detail_order'));
    }

}
