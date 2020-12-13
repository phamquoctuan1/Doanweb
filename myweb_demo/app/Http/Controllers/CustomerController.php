<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
session_start();


class CustomerController extends Controller
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
    public function all_customer()
    {
        $this->AuthLogin();

        $all_customer = DB::table('users')->get();
        return view('admin.all_customer',compact('all_customer'));
    }
    //endfuction_admin
    public function show_category_home($id)
    {

    }
}
