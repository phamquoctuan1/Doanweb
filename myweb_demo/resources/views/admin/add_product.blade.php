@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                    }
                    ?>

                    <div class="position-center">
                        <form role="form" method="post" action="{{ url('save-product') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="product_name"
                                    placeholder="Nhập tên danh mục">
                                    @if ($errors->has('product_name'))
                                        {{ $errors->first('product_name') }}
                                        @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Liên kết</label>
                                <input type="text" class="form-control" name="product_slug">
                                @if ($errors->has('product_slug'))
                                {{ $errors->first('product_slug') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">giới thiệu</label>
                                <input type="text" class="form-control" name="product_intro">
                                @if ($errors->has('product_intro'))
                                {{ $errors->first('product_intro') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">khuyến mãi </label>
                                <input type="text" class="form-control" name="product_promo">
                                @if ($errors->has('product_promo'))
                                {{ $errors->first('product_promo') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phụ kiện đi kèm</label>
                                <input type="text" class="form-control" name="product_packet">
                                @if ($errors->has('product_packet'))
                                {{ $errors->first('product_packet') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh</label>
                                <input type="file" name="product_images" multiple="multiple">
                                @if ($errors->has('product_images'))
                                {{ $errors->first('product_images') }}
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Đánh giá</label>
                                    <textarea name="product_review" class="form-control " id="editor1"></textarea>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Giá</label>
                                <input type="text" class="form-control" name="product_price">
                                @if ($errors->has('product_price'))
                                {{ $errors->first('product_price') }}
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select class="form-control input-sm m-bot15" name="product_status">
                                    <option value="0">Hết hàng</option>
                                    <option value="1">Còn hàng</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục</label>
                                <select  class="form-control input-sm m-bot15" id="danhmuc" name="product_category">
                                    @foreach ($category as $key => $item)
                                        <option value="{{ $item ->cate_id}}">{{ $item ->cate_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hãng-Thương hiệu</label>
                                <select  class="form-control input-sm m-bot15" id="thuonghieu" name="product_brand">
                                    @foreach ($brand as $key => $item)
                                        <option value="{{ $item ->brand_id }}">{{ $item ->brand_name }}</option>
                                    @endforeach


                                </select>
                            </div>


                            <button type="submit" name="add_category" class="btn btn-info">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>

    @endsection

    @section("script")
    <script>
        $(document).ready(function() {
           $("#danhmuc").change(function() {
            var iddanhmuc = $("#danhmuc").val();
            $.get("ajax/danhmuc"+iddanhmuc, function(data) {
                alert(data);
                // $("#thuonghieu").html(data);
            });
           });
        });
    </script>
@endsection
