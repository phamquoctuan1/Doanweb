@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập nhật sản phẩm
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
                        @foreach ($edit_product as $key => $item)
                        <form role="form" method="post" action="{{ url('update-product',$item->pro_slug) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" class="form-control" value="{{ $item->pro_name }}" name="product_name"
                                    placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Liên kết</label>
                                <input type="text" class="form-control" value="{{ $item->pro_slug }}" name="product_slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">giới thiệu</label>
                                <input type="text" class="form-control" value="{{ $item->pro_intro }}" name="product_intro">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">khuyến mãi </label>
                                <input type="text"  class="form-control" value="{{ $item->pro_promo }}"  name="product_promo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phụ kiện đi kèm</label>
                                <input type="text" class="form-control" value="{{ $item->pro_packet}}" name="product_packet">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh</label>
                                <input type="file"  name="product_images" >

                                <img name="product_image" src="{{asset('/uploads/product/'.$item->pro_images )}}" height="100" width="100">
                            </div>
                            <div class="form-group">
                                   <label>Đánh giá</label>
                                    <textarea name="product_review" class="form-control " id="editor1"></textarea>

                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Giá</label>

                                <input type="text" class="form-control" value="{{ $item->pro_price }}" name="product_price">
                                @if ($errors->has('product_price'))
                                <span style="color:red">{{ $errors->first('product_price') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                <select class="form-control input-sm m-bot15"  value="{{ $item->pro_status }}"  name="product_status">
                                    @if ($item->pro_status==0)
                                    <option value="0">Hết hàng</option>
                                    <option value="1">Còn hàng</option>
                                    @else
                                    <option value="1">Còn hàng</option>
                                    <option value="0">Hết hàng</option>
                                    @endif



                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục</label>
                                <select class="form-control input-sm m-bot15"  name="product_category">
                                    @foreach ($edit_product as $key => $item)
                                        <option value="{{ $item ->cate_id }}">{{ $item ->cate_name }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hãng</label>
                                <select class="form-control input-sm m-bot15"  name="product_brand">
                                    @foreach ($edit_product as $key => $item)
                                        <option value="{{ $item ->brand_id }}">{{ $item ->brand_name }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <button type="submit" name="update_category" class="btn btn-info">Cập nhật</button>
                        </form>
                        @endforeach
                    </div>

                </div>

            </section>

        </div>

    @endsection
