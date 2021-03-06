@extends('welcome')
@section('content')

<div class="features_items" id="datasearch"><!--features_items-->
    <h2 class="title text-center">Mobile - Điện thoại </h2>
    @foreach ($mobile as $key => $item)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <form >
                            @csrf
                            <input type="hidden" value="{{ $item->pro_id }}" class="cart_product_id_{{ $item->pro_id }}">
                            <input type="hidden" value="{{ $item->pro_name }}" class="cart_product_name_{{ $item->pro_id }}">
                            <input type="hidden" value="{{ $item->pro_images }}" class="cart_product_images_{{ $item->pro_id }}">
                            <input type="hidden" value="{{ $item->pro_price }}" class="cart_product_price_{{ $item->pro_id }}">
                            <input type="hidden" value="1" class="cart_product_qty_{{ $item->pro_id }}">
                        <a href="{{ url('chi-tiet-san-pham',$item->pro_id) }}">
                        <img src="{{asset ('uploads/product/'.$item->pro_images) }}" alt="" style="height:270px" />
                        <h2>{{ $item->pro_name }}</h2>
                    </a><p>{{ number_format($item->pro_price,0,'.','.').' '.'VNĐ' }}</p>
                        <button name="add-to-cart" style="color:red" type="button" class="btn btn-default add-to-cart" data-id="{{ $item->pro_id }}"> Thêm giỏ hàng</button>
                    </form>
                    </div>

            </div>

        </div>
    </div>
@endforeach
</div><!--features_items-->

<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Laptop - Máy tính xách tay </h2>
    @foreach ($laptop as $key => $item)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                         <form >
                            @csrf
                            <input type="hidden" value="{{ $item->pro_id }}" class="cart_product_id_{{ $item->pro_id }}">
                            <input type="hidden" value="{{ $item->pro_name }}" class="cart_product_name_{{ $item->pro_id }}">
                            <input type="hidden" value="{{ $item->pro_images }}" class="cart_product_images_{{ $item->pro_id }}">
                            <input type="hidden" value="{{ $item->pro_price }}" class="cart_product_price_{{ $item->pro_id }}">
                            <input type="hidden" value="1" class="cart_product_qty_{{ $item->pro_id }}">
                            <a href="{{ url('chi-tiet-san-pham',$item->pro_id) }}">
                                <img src="{{asset ('uploads/product/'.$item->pro_images) }}" alt="" style="height:270px" />
                            </a><h2>{{ number_format($item->pro_price,0,'.','.').' '.'VNĐ' }}</h2>
                                <p>{{ $item->pro_name }}</p>
                    <button name="add-to-cart" style="color:red" type="button" class="btn btn-default add-to-cart" data-id="{{ $item->pro_id }}"> Thêm giỏ hàng</button>
                </form>
                    </div>

            </div>

        </div>
    </div>

@endforeach
</div><!--features_items-->

<div class="features_items"><!--features_items-->
    <h2 class="title text-center">PC - Máy tính bàn </h2>
    @foreach ($pc as $key => $item)

  <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <form >
                            @csrf
                            <input type="hidden" value="{{ $item->pro_id }}" class="cart_product_id_{{ $item->pro_id }}">
                            <input type="hidden" value="{{ $item->pro_name }}" class="cart_product_name_{{ $item->pro_id }}">
                            <input type="hidden" value="{{ $item->pro_images }}" class="cart_product_images_{{ $item->pro_id }}">
                            <input type="hidden" value="{{ $item->pro_price }}" class="cart_product_price_{{ $item->pro_id }}">
                            <input type="hidden" value="1" class="cart_product_qty_{{ $item->pro_id }}">
                            <a href="{{ url('chi-tiet-san-pham',$item->pro_id) }}">
                                <img src="{{asset ('uploads/product/'.$item->pro_images) }}" alt="" style="height:270px" />
                            </a><h2>{{ number_format($item->pro_price,0,'.','.').' '.'VNĐ' }}</h2>
                                <p>{{ $item->pro_name }}</p>
                                <button style="color:red" name="add-to-cart" type="button" class="btn btn-default add-to-cart" data-id="{{ $item->pro_id }}"> Thêm giỏ hàng</button>
                </form>

                    </div>

            </div>

        </div>
    </div>
@endforeach
</div><!--features_items-->


@endsection
