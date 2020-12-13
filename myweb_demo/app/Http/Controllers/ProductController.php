<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

session_start();
class ProductController extends Controller
{

    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if (isset($admin_id)) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }
    public function all_product()
    {
        $this->AuthLogin();
        $product_details = DB::table('products')->join('pro_details', 'pro_details.pro_id', '=', 'products.pro_id')->get();
        $all_product = DB::table('products')->join('category', 'category.cate_id', '=', 'products.cat_id')->join('brand', 'brand.brand_id', '=', 'products.brand_id')->orderBy('products.pro_id', 'asc')->get();
        return view('admin.all_product', compact('all_product', 'product_details'));
    }
    public function add_product()
    {
        $this->AuthLogin();
        $category = DB::table('category')->get();
        $brand = DB::table('brand')->get();
        return view('admin.add_product', compact('category', 'brand'));
    }
    public function save_product(Request $request)
    {
        $this->AuthLogin();
        $validator = Validator::make($request->all(), [
            'product_name'       => 'required|max:255',
            'product_slug'      => 'required',
            'product_intro'    => 'required',
            'product_promo'    => 'required',
            'product_packet'    => 'required',
            'product_review'    => 'required',
            'product_price' => 'required|numeric',
            'product_images'    => 'required'

        ], [
            'product_name.required' => 'Nhập tên sản phẩm',
            'product_slug.required' => 'Nhập đường dẫn cho dễ tìm',
            'product_intro.required' => 'Không được bỏ trống',
            'product_promo.required' => 'Không được bỏ trống',
            'product_packet.required' => 'Không được bỏ trống',

            'product_price.required' => 'Giá nhiêu?',
            'product_images.required' => 'Thêm 1 ít nhất một ảnh',
        ]);
        if ($validator->fails()) {

            return redirect('add-product')
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = array();
            $data['pro_name'] = $request->product_name;
            $data['pro_slug'] = $request->product_slug;
            $data['pro_intro'] = $request->product_intro;
            $data['pro_promo'] = $request->product_promo;
            $data['pro_packet'] = $request->product_packet;
            $data['pro_price'] = $request->product_price;
            $data['pro_status'] = $request->product_status;
            $data['created_at'] = NOW();
            $data['cat_id'] = $request->product_category;
            $data['brand_id'] = $request->product_brand;
            $get_images = $request->file('product_images');
            if ($get_images) {
                $get_name_images = $get_images->getClientOriginalName();
                $name_images = current(explode('.', $get_name_images));
                $new_images = $name_images . rand(0, 99) . '.' . $get_images->getClientOriginalExtension();
                $get_images->move(base_path('public/uploads/product'), $new_images);
                $data['pro_images'] = $new_images;
                DB::table('products')->insert($data);
                Session::put('message', 'Thêm sản phẩm thành công');

                return redirect('add-product');
            }
            $data['images'] = '';
            DB::table('products')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return redirect('add-product');
        }
    }
    public function edit_product($pro_slug)
    {
        $this->AuthLogin();
        $edit_product = DB::table('products')->join('brand', 'brand.brand_id', '=', 'products.brand_id')->join('category', 'category.cate_id', '=', 'products.cat_id')->where('pro_slug', $pro_slug)->get();
        return view('admin.edit_product')->with('edit_product', $edit_product);
    }
    public function update_product(Request $request, $pro_slug)
    {

        $this->AuthLogin();
        $validator = Validator::make($request->all(), [
            'product_price' => 'numeric',

        ], [
            'product_price.numeric' => 'Tiền đó trời ơi',

        ]);
        if ($validator->fails()) {

            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = array();
            $data['pro_name'] = $request->product_name;
            $data['pro_slug'] = $request->product_slug;
            $data['pro_intro'] = $request->product_intro;
            $data['pro_promo'] = $request->product_promo;
            $data['pro_packet'] = $request->product_packet;
            $data['pro_price'] = $request->product_price;
            $data['pro_status'] = $request->product_status;
            $data['updated_at'] = NOW();
            $data['cat_id'] = $request->product_category;
            $data['brand_id'] = $request->product_brand;
            $get_images = $request->file('product_images');
            if ($get_images) {
                $get_name_images = $get_images->getClientOriginalName();
                $name_images = current(explode('.', $get_name_images));
                $new_images = $name_images . rand(0, 99) . '.' . $get_images->getClientOriginalExtension();
                $get_images->move('public/uploads/product', $new_images);
                $data['pro_images'] = $new_images;
                DB::table('products')->where('pro_slug', $pro_slug)->update($data);
                Session::put('message', 'Cập nhật thành công');
                return redirect('all-product');
            }

            DB::table('products')->where('pro_slug', $pro_slug)->update($data);
            Session::put('message', 'Cập nhật thành công');
            return redirect('all-product');
        }
    }
    public function delete_product($pro_slug)
    {
        $this->AuthLogin();
        DB::table('products')->where('pro_slug', $pro_slug)->delete();
        Session::put('message', 'Xóa danh mục thành công');
        return redirect('all-product');
    }
    public function detail_products($pro_slug)
    {
        $this->AuthLogin();
        $pro_details = DB::table('pro_details')->join('products', 'products.pro_id', '=', 'pro_details.pro_id')->where('pro_slug', $pro_slug)->get();
        return view('admin.detail_product')->with('pro_details', $pro_details);
    }
    public function add_detail_products()
    {
        $this->AuthLogin();
        $data = DB::table('products')->get();
        return view('admin.add_detail_products')->with('data', $data);
    }
    public function save_detail_product(Request $request)
    {
        $this->AuthLogin();
        $validator = Validator::make($request->all(), [
            'cpu'       => 'required',
            'ram'      => 'required',
            'screen'    => 'required',
            'vga'    => 'required',
            'storage'    => 'required',
            'exten_memmory'    => 'required',
            'cam1' => 'required',
            'cam2'    => 'required',
            'sim' => 'required',
            'connect'    => 'required',
            'pin' => 'required',
            'os'    => 'required',

        ], [
            'cpu.required' => 'Không được bỏ trống',
            'ram.required' => 'Không được bỏ trống',
            'screen.required' => 'Không được bỏ trống',
            'vga.required' => 'Không được bỏ trống',
            'storage.required' => 'Không được bỏ trống',
            'exten_memmory.required' => 'Không được bỏ trống',
            'cam1.required' => 'Không được bỏ trống',
            'cam2.required' => 'Không được bỏ trống',
            'sim.required' => 'Không được bỏ trống',
            'connect.required' => 'Không được bỏ trống',
            'pin.required' => 'Không được bỏ trống',
            'os.required' => 'Không được bỏ trống',
        ]);
        if ($validator->fails()) {

            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = array();
            $data['cpu'] = $request->cpu;
            $data['ram'] = $request->ram;
            $data['screen'] = $request->screen;
            $data['vga'] = $request->vga;
            $data['storage'] = $request->storage;
            $data['exten_memmory'] = $request->exten_memmory;
            $data['cam1'] = $request->cam1;
            $data['cam2'] = $request->cam2;
            $data['sim'] = $request->sim;
            $data['connect'] = $request->connect;
            $data['pin'] = $request->pin;
            $data['os'] = $request->os;
            $data['pro_id']= $request->product;
            DB::table('pro_details')->insert($data);
            Session::put('message', 'Thêm chi tiết sản phẩm thành công');
            return redirect('all-product');
        }
    }
}
