@extends('welcome')
@section('content')

<style>
    table, th, td {
      border: 0px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 5px;
      text-align: left;
    }
    </style>

    @foreach ($mobile_details as $key => $item)


        <div class="product-details">
            <!--product-details-->
            <div class="col-sm-4">
                <div class="view-product">
                    <img src="{{ asset('/uploads/product/' . $item->pro_images) }}" alt="" />

                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            {{-- <a href=""><img src="{{ asset('public/uploads/product/' . $item->images_url) }}" alt=""></a> --}}

                        </div>

                    </div>

                    <!-- Controls -->

                </div>

            </div>
            <div class="col-sm-3">
                <div class="product-information">
                    <!--/product-information-->
                    <h2>{{ $item->pro_name }}</h2>
                    <form >
                        @csrf
                        <input type="hidden" value="{{ $item->pro_id }}" class="cart_product_id_{{ $item->pro_id }}">
                        <input type="hidden" value="{{ $item->pro_name }}" class="cart_product_name_{{ $item->pro_id }}">
                        <input type="hidden" value="{{ $item->pro_images }}" class="cart_product_images_{{ $item->pro_id }}">
                        <input type="hidden" value="{{ $item->pro_price }}" class="cart_product_price_{{ $item->pro_id }}">
                        <input type="hidden" value="1" class="cart_product_qty_{{ $item->pro_id }}">
                        <h3>{{ number_format($item->pro_price) . ' ' . 'VNĐ' }}</h3>
                        <input name="productid_hidden" type="hidden"  value="{{ $item->pro_id }}" />
                        <button name="add-to-cart" style="color:red" type="button" class="btn btn-default add-to-cart" data-id="{{ $item->pro_id }}"> Thêm giỏ hàng</button>

                </form>
                    <p><b>Tình trạng :</b> Còn hàng</p>
                    <p><b>Mô tả:</b> Hàng mới</p>
                    <p><b>Thương hiệu:</b> {{ $item->cate_name }}</p>
                    <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
                </div>
                <!--/product-information-->
            </div>
            <div class="col-sm 5">
                <img src="{{ asset('/uploads/product/' . $item->pro_images) }}" height="100" width="100" alt="" />

            </div>
        </div>
        <!--/product-details-->

        <div class="category-tab shop-details-tab">
            <!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details">
                    <h2>Cấu hình chi tiết</h2>
                    <table style="width: 100%;">
                        <tr>
                            <th>Cpu :</th>
                            <td> {{ $item->cpu }}</td>
                        </tr>
                        <tr>
                            <th>Ram </th>
                            <td>{{ $item->ram }}</td>
                        </tr>
                        <tr>
                            <th>Màn hình </th>
                            <td>{{ $item->screen }}</td>
                        </tr>
                        <tr>
                            <th>Card đồ họa </th>
                            <td>{{ $item->vga }}</td>
                        </tr>
                        <tr>
                            <th>Bộ nhớ trong </th>
                            <td>{{ $item->storage }}</td>
                        </tr>
                        <tr>
                            <th>Thẻ nhớ </th>
                            <td>{{ $item->exten_memmory }}</td>
                        </tr>
                        <tr>
                            <th>Camera trước</th>
                            <td>{{ $item->cam1 }}</td>
                        </tr>
                        <tr>
                            <th>Camera sau</th>
                            <td>{{ $item->cam2 }}</td>
                        </tr>
                        <tr>
                            <th>Khe Sim</th>
                            <td>{{ $item->sim }}</td>
                        </tr>
                        <tr>
                            <th>Pin</th>
                            <td>{{ $item->pin }}</td>
                        </tr>
                        <tr>
                            <th>Kết nối</th>
                            <td>{{ $item->connect }}</td>
                        </tr>
                        <tr>
                            <th>Hệ điều hành</th>
                            <td>{{ $item->os }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>

        <!--/category-tab-->
    @endforeach

    </div>
    </div>
    </div>
@endsection
