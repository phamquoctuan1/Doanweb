@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
              Danh sách  Đơn hàng
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
                            <input type="text" class="input-sm form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="button">Tìm!</button>
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
                            <th>Tổng tiền </th>
                            <th>Trạng thái</th>
                            <th>Ghi Chú</th>
                            <th>Khách hàng</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $key => $item)
                           <tr>
                                   <td> <span  class="text-ellipsis">{{ $key + 1 }}</span></td>
                        <td><span class="text-ellipsis">{{ number_format($item->amount) }} VNĐ</span></td>
                                <td>  <span class="text-ellipsis"><?php if ($item->order_status == 0) {?>
                                    <a href="{{ url('active', $item->order_id) }}"> Chờ xác nhận
                                   <?php } else {?>
                                       <p>Đã xác nhận <i class="fa fa-check" aria-hidden="true"></i> </p>
                                   <?php } ?>
                                    </a>
                                </td>
                                <td><span class="text-ellipsis">{{ $item->note }}<span></td>
                                <td> <span class="text-ellipsis">{{ $item->name }}<span></td>
                                <td> <a onclick="return confirm('Bạn có chắc hủy đơn hàng này?')"
                                    href="{{ url('delete-order', $item->order_id) }}">
                                    <i class="icon-fixed-width icon-trash"></i> </a></td>
                                    <td>
                                        <a id="details_order" href="{{ url('detail-order/'.$item->order_id) }}">Chi tiết </a>
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
            </footer>
        </div>
    </div>

@endsection
