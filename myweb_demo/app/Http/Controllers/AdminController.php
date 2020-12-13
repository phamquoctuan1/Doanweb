<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
session_start();
class AdminController extends Controller
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
    public function index()
    {
        return view('admin_login');
    }
    public function show_dashboard()
    {   $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {

        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $admin = DB::table('admin_users')->where('email', $admin_email)->where('password',$admin_password)->first();
        if(isset($admin)) {
            Session::put('admin_name',$admin->name);
            Session::put('admin_id',$admin->id);
            return view('admin.dashboard');
        }
        Session::put('message', 'Sai tài khoản hoặc mật khẩu');
        return back();
    }
    public function logout()
    {   $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return redirect('admin');
    }
}
