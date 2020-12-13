<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
session_start();

class CategoryController extends Controller
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

    public function all_category()
    {
        $this->AuthLogin();
        $all_category = DB::table('category')->where('parent_id',0)->get();
        return view('admin.all_category',compact('all_category'));
    }
    public function add_category()
    {
        $this->AuthLogin();
        $category = DB::table('category')->where('parent_id',0)->get();
        return view('admin.add_category')->with('category',$category);
    }
    public function save_category(Request $request)
    {
        $this->AuthLogin();

        $data = array();
        $data['cate_name']=$request->category_name;
        $data['cate_slug']=$request->category_slug;
        $data['parent_id']=$request->category_parent_id;
        DB::table('category')->insert($data);
        Session::put('message','Thêm danh mục thành công');
        return redirect('add-category');

    }
    public function edit_category($id)
    {
        $this->AuthLogin();
        $category = DB::table('category')->get();
        $edit_category = DB::table('category')->where('cate_id',$id)->get();
        return view('admin.edit_category',compact('edit_category','category'));

    }
    public function update_category(Request $request,$id)
    {
        $this->AuthLogin();
        $data= array();
        $data['cate_name']=$request->category_name;
        $data['cate_slug']=$request->category_slug;
        $data['parent_id']=$request->category_parent_id;
        $result=DB::table('category')->where('cate_id',$id)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        return redirect('all-category');

    }
    public function delete_category($id)
    {
        $this->AuthLogin();
        DB::table('category')->where('cate_id',$id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return redirect('all-category');
    }
    public function danh_muc($id)
    {
        $all_brand = DB::table('category')->join('brand','category.cate_id','=','brand.category_id')->where('cate_id',$id)->get();
        return view('admin.all_brand',compact('all_brand'));
    }

}
