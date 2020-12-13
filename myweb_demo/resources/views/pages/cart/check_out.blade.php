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
            @if (session()->has('message'))
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

                            @if (Session::get('cart') == true)
                                @php
                                $total = 0 ;
                                @endphp
                                @foreach (Session::get('cart') as $key => $cart)
                                    @php
                                    $subtotal = $cart['product_price']*$cart['product_qty'] ;
                                    $total += $subtotal;
                                    @endphp
                                    <tr>
                                        <td class="cart_product">
                                            <img src="{{ asset('uploads/product/' . $cart['product_images']) }}" width="90"
                                                alt="{{ $cart['product_name'] }}">
                                        </td>
                                        <td class="cart_description">

                                            <p>{{ $cart['product_name'] }}</p>
                                        </td>
                                        <td class="cart_price">
                                            <p>{{ number_format($cart['product_price']) }} VNĐ</p>
                                        </td>
                                        <td class="cart_quantity">

                                            <input class="cart_quantity" disabled="disabled" type="number" min="1"
                                                name="cart_qty[{{ $cart['session_id'] }}]"
                                                value="{{ $cart['product_qty'] }}">
                                        </td>
                                        <td class="cart_total">
                                            <p class="cart_total_price">{{ number_format($subtotal, 0, ',', '.') }} VNĐ</p>
                                        </td>
                                    </tr>
                                @endforeach
                                <td colspan="6">
                                    <strong>
                                        <p class="check_out1">Tổng tiền
                                            <span>{{ number_format($total, 0, ',', '.') }}</span></p>
                                    </strong>
                                </td>
                                </tr>
                        </tbody>
                </form>
                </table>
                <div>

                        <legend class="text-align">Xác nhận thông tin khách hàng</legend>
                            <p > - Tên khách hàng : <strong>{{ Auth::user()->name }} </strong> </p>
                            <p > - Điện thoại: <strong > {{ Auth::user()->phone }}</strong> </p>
                            <p > - Địa chỉ: <strong >{{ Auth::user()->address }}</strong></p>
                        </div>

                            <form  class="form-group" action="{{ url('check-out')}}" method="POST">
                            <label for="">Các ghi chú khác</label>
                            <form action="" role="form">
                                @csrf
                                <div>
                            <textarea  style="border:2"   placeholder="Nhập thêm ghi chú " name="txtnote" id="inputtxtNote" class="form-control" rows="4" >
                  </textarea>
                        </div>

                        <button type="submit" class="btn btn-primary pull-right">Đặt hàng</button>
                    </form>

                </div>
            </div>
        </div>
        @endif
    </section>


@endsection
