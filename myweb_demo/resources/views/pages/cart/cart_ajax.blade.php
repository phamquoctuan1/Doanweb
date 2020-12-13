@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ url('/trang-chu') }}">Trang chủ</a></li>
              <li class="active"> Giỏ hàng của bạn</li>
            </ol>
        </div>
       @if(session()->has('message'))
       <div class="alert alert-success">
           {{ session()->get('message') }}
       </div>
       @endif

        <div class="table-responsive cart_info">

            <form action="{{ url('update-cart-ajax') }}" method="post">
                @csrf
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Thành tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>

                    @if(Session::get('cart')==true)
                    @php
                    $total = 0 ;
                    @endphp
                    @foreach(Session::get('cart') as $key => $cart)
                    @php
                    $subtotal = $cart['product_price']*$cart['product_qty'] ;
                    $total += $subtotal;
                    @endphp
                    <tr>
                        <td class="cart_product">
                           <img src="{{ asset('uploads/product/'.$cart['product_images']) }}" width="90" alt="{{ $cart['product_name'] }}">
                        </td>
                        <td class="cart_description">

                         <a href="{{ url('chi-tiet-san-pham/'.$cart['product_id']) }}"><p>{{ $cart['product_name'] }}</p></a>
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($cart['product_price']) }} VNĐ</p>
                        </td>
                        <td class="cart_quantity">

                                <input class="cart_quantity" type="number"  min="1" name="cart_qty[{{ $cart['session_id'] }}]" value="{{ $cart['product_qty'] }}">
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ number_format($subtotal,0,',','.')}} VNĐ</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{ url('delete-cart/'.$cart['session_id']) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    <tr> <td>
                    <input type="submit" name="update_qty" value="Cập nhật giỏ hàng" class="check_out btn btn-default btn-sm"></td>
                    <td><a class="check_out btn btn-default   " href="{{ url('delete-all-ajax') }}">Xóa giỏ hàng</a>
                    </td>
                    @if (Auth::check())
                    <td colspan="3">
                        <a class="check_out btn btn-default   "href="{{ url('checkout') }}">Thanh toán</a>
                    </td>
                    @else
                    <td> <a class="check_out btn btn-default   "href="{{ url('login') }}">Vui Lòng đăng nhập để thanh toán</a></td>
                    @endif
                    <td colspan="">
                       <strong>  <p class="check_out1">Tổng tiền <span>{{ number_format($total,0,',','.')}}</span></p></strong>

                    </td>
                </tr>
                </tbody>
            </form>
            @else
            <tr>
            <td colspan="5">
                @php
                echo ' Không có sản phẩm nào trong giỏ hàng';
                @endphp
            </td>
        </tr>
            @endif
            </table>
        </div>
    </div>
</section>


@endsection
