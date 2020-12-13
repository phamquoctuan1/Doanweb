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
                    <div class="input-group">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            {{-- <button class="btn btn-sm btn-default" type="button">Tìm!</button> --}}
                        </span>
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
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_customer as $key => $item)


                            <tr>
                                <td><span class="text-ellipsis">{{ $key + 1 }}</span></td>
                                <td ><span class="text-ellipsis">{{ $item->name }}</span></td>
                                <td><span class="text-ellipsis">{{ $item->email }}</span></td>
                                <td><span class="text-ellipsis">{{ $item->phone }}</span></td>
                                <td><span class="text-ellipsis">{{ $item->address }}</span></td>
                                <td><span class="text-ellipsis"><?php
                                    if ($item->status==1){
                                        echo 'Hoạt động';
                                    }else {
                                        echo 'Không hoạt động';
                                    }
                                    ?><span></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <footer class="panel-footer">
                <div class="row">

                    <div class="col-sm-3 text-center">

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
