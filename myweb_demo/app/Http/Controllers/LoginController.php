<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

session_start();
class LoginController extends Controller
{
    public function login()
    {
        return view('users.login');
    }
    public function sign_up()
    {
        return view('users.register');
    }
    public function postlogin(Request $request)
    {

        $crendentials = $request->only('email', 'password');

        if ((Auth::attempt($crendentials))) {
            return redirect('/');
        } else {
            Session::flash('message', 'Sai tài khoản hoặc mật khẩu');
            return back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function postregister(Request $request)
    {
        request()->validate([

            'name' => 'required',


            'email' => 'required|email|unique:users',

            'password' => 'required|min:6',


            'phone' => 'required|numeric|min:10',

            'address' => 'required',

        ], [
            'name.required' => 'Vui lòng nhập tên ',
            'email.required' => 'Email không được bỏ trốngtrống',
            'email.required' => "vui lòng nhập đúng định dạng email",
            'email.unique' => 'Email đã có người sử dụng',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.min' => 'Vui lòng nhập đúng số điện thoại',
            'phone.numeric' => 'Vui lòng nhập đúng định dạng số điện thoại',
            'address.required' => 'Vui lòng thêm địa chỉ'
        ]);
        $user =  DB::table('users')->insert([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        Session::flash('status', 'Đăng kí thành công');
        return redirect('sign-up');
}
}
