<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
session_start();
class AjaxController extends Controller
{
    public function search_ajax(Request $request)
    {
        $data = $request->get('Search');
        $output = '';
        $products = DB::table('products')->join('brand', 'products.brand_id','brand.brand_id')->join('category','category.cate_id','=','products.cat_id')->where('pro_name', 'like','%'.$data.'%')->get();
        if ($products) {
            foreach ($products as $key => $item) {
                $output .= '<tr>
                <td>' . $item->pro_id . '</td>
                <td>' . $item->pro_name . '</td>
                <td>' . $item->pro_slug . '</td>
                <td>' . $item->pro_intro . '</td>
                <td>' . $item->pro_promo . '</td>
                <td>' . $item->pro_packet . '</td>
                <td> <img src="/uploads/product/'.$item->pro_images .'"  height="100" width="100"></td>
                <td>' . number_format($item->pro_price,0, '.', '.')  . '</td>
                <td>'  .$this->chuyen($item->pro_status).  '</td>
                <td>' . $item->cate_name . '</td>
                <td>' . $item->brand_name . '</td>
                </tr>';
            }
        }
        return Response($output);
    }
    public function chuyen(int $a)
    {
        if($a == 0)
        {
            return 'hết hàng';
        }
        else
        {
            return 'còn hàng';
        }
    }
    public function search_ajax_index(Request $request)
    {
        $data = $request->get('Search');
        $output = '';
        $products = DB::table('products')->where('pro_name', 'like','%'.$data.'%')->get();
        if ($products) {
            foreach ($products as $key => $item) {
                $output .= '<tr>
                <td>' . $item->pro_id . '</td>
                <td>' . $item->pro_name . '</td>
                <td>' . $item->pro_slug . '</td>
                <td>' . $item->pro_intro . '</td>
                <td>' . $item->pro_promo . '</td>
                <td>' . $item->pro_packet . '</td>
                <td> <img src="/uploads/product/'.$item->pro_images .'"  height="100" width="100"></td>
                <td>' . number_format($item->pro_price,0, '.', '.')  . '</td>
                <td>'  .$this->chuyen($item->pro_status).  '</td>
                </tr>';
            }
        }return Response($output);



    }
}
