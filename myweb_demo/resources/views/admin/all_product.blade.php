@extends('admin_layout')
@section('admin_content')


    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh mục sản phẩm
            </div>

            <div class="row w3-res-tb">
                <div class="col-sm-5 m-b-xs">


                </div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                    <form action="">
                        @csrf
                        <div class="input-group">
                            <input type="text" id="txtSearch" class="input-sm form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button id="btnSearch" class="btn btn-sm btn-default" type="button">Tìm!</button>
                            </span>
                    </form>
                </div>
            </div>
        </div>
            <?php
            $message = Session::get('message');
            if ($message) {
            echo '<span class="text-alert ">' . $message . '</span>';
            Session::put('message', null);
            }
            ?>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>

                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Liên kết</th>
                            <th>Giới thiệu</th>
                            <th>Khuyến mãi</th>
                            <th>Phụ kiện kèm</th>
                            <th>Hình ảnh</th>

                            <th>Giá</th>
                            <th>Tình trạng</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>

                            <th style="width:10px;"></th>
                        </tr>
                    </thead>
                    <tbody id="found" >
                        @foreach ($all_product as $key => $item)


                            <tr>

                                <td><span class="text-ellipsis">{{ $key + 1 }}</span></td>

                                <td> <a href="{{ url('detail-products/'.$item->pro_slug) }}"> <span class="text-ellipsis">{{ $item->pro_name }}</span> </a></td>
                                <td><span class="text-ellipsis">{{ $item->pro_slug }}</span></td>
                                <td><span class="text-ellipsis">{{ $item->pro_intro }}</span></td>
                                <td><span class="text-ellipsis">{{ $item->pro_promo }}</span></td>
                                <td><span class="text-ellipsis">{{ $item->pro_packet }}</span></td>
                                <td><span class="text-ellipsis"><img src="/uploads/product/{{ $item->pro_images }}"
                                            height="100" width="100"></span></td>
                                <td><span class="text-ellipsis">{{ number_format($item->pro_price,0, '.', '.') }} </span>
                                </td>
                                <td><span class="text-ellipsis"><?php if ($item->pro_status == 0) {
                                        echo 'Hết hàng';
                                        } else {
                                        echo 'Còn hàng';
                                        } ?>
                                    </td>
                                <td><span class="text-ellipsis">{{ $item->cate_name }}</span></td>
                                <td><span class="text-ellipsis">{{ $item->brand_name }}</span></td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc xóa sản phẩm này?')"
                                        href="{{ url('delete-product', $item->pro_slug) }}">
                                        <i class="icon-fixed-width icon-trash"></i> </a>
                                        <a href="{{ url('edit-product', $item->pro_slug) }}">
                                            <i class="icon-fixed-width icon-pencil"></i></a>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-3 text-center">
                        <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-9 text-right text-center-xs">
                        <ul class="pagination pagination-sm m-t-none m-b-none">
                            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                        </ul>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
    </footer>
    </div>
    </div>

@endsection
