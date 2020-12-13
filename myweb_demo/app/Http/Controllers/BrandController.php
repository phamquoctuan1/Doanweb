<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
session_start();
class BrandController extends Controller
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

    public function all_brand()
    {
        $this->AuthLogin();
        $all_brand = DB::table('brand')->join('category','brand.category_id','=', 'category.cate_id')->get();
        return view('admin.all_brand',compact('all_brand'));
    }
    public function add_brand()
    {
        $this->AuthLogin();
        $brand = DB::table('brand')->join('category', 'category.cate_id','=','brand.category_id')->GroupBy('cate_id')->get();
        return view('admin.add_brand')->with('brand',$brand);
    }
    public function save_brand(Request $request)
    {
        $this->AuthLogin();
        $validator = Validator::make($request->all(), [
            'brand_name'       => 'required|max:255',
            'brand_slug'      => 'required',


        ], [
            'brand_name.required' => 'Nhập tên thương hiệu',
            'brand_slug.required' => 'Nhập đường dẫn cho dễ tìm',

        ]);
        if ($validator->fails()) {

            return redirect('add-brand')
                ->withErrors($validator)
                ->withInput();
        }else
        $data = array();
        $data['brand_name']=$request->brand_name;
        $data['slug']=$request->brand_slug;
        $data['category_id']=$request->brand_parent_id;
        DB::table('brand')->insert($data);
        Session::put('message','Thêm  thành công');
        return redirect('add-brand');

    }
    public function edit_brand($slug)
    {
        $this->AuthLogin();
        $brand = DB::table('brand')->join('category','category.cate_id','=','brand.category_id')->GroupBy('cate_id')->get();
        $edit_brand = DB::table('brand')->where('slug',$slug)->get();
        return view('admin.edit_brand',compact('edit_brand','brand'));

    }
    public function update_brand(Request $request,$slug)
    {
        $this->AuthLogin();
        $data= array();
        $data['brand_name']=$request->brand_name;
        $data['slug']=$request->brand_slug;
        $data['category_id']=$request->category_parent_id;
        $result=DB::table('brand')->where('slug',$slug)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        return redirect('all-brand');

    }
    public function delete_brand($slug)
    {
        $this->AuthLogin();
        DB::table('brand')->where('slug',$slug)->delete();
        Session::put('message','Xóa danh mục thành công');
        return redirect('all-brand');
    }
    public function danh_muc($id) {

    $all_product = DB::table('products')->join('category', 'category.cate_id', '=', 'products.cat_id')->join('brand', 'brand.brand_id', '=', 'products.brand_id')->where('brand.brand_id', $id)->get();
        return view('admin.all_product', compact('all_product'));

    }


}
