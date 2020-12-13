@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
             Chi tiết sản phẩm
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
                            <th>Tên sản phẩm </th>
                            <th>cpu</th>
                            <th>ram</th>
                            <th>Màn hình</th>
                            <th>Card màn hình</th>
                            <th>Bộ nhớ</th>
                            <th>Bộ nhớ ngoài</th>
                            <th>Camera trước</th>
                            <th>Camera sau</th>
                            <th>Sim</th>
                            <th>Kết nối</th>
                            <th>Pin</th>
                            <th>Hệ điều hành</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pro_details as $key => $item)
                            <tr>
                                <td><span class="text-ellipsis">  {{ $item->pro_name }}</span></td> </span></td>
                                <td><span class="text-ellipsis">  {{ $item->cpu }} </span></td>
                                <td><span class="text-ellipsis">  {{ $item->ram }} </span></td>
                                <td><span class="text-ellipsis">  {{ $item->screen}} </span></td>
                                <td><span class="text-ellipsis">  {{ $item->vga }} </span></td>
                                <td><span class="text-ellipsis">  {{ $item->storage }} </span></td>
                                <td><span class="text-ellipsis">  {{ $item->exten_memmory }} </span></td>
                                <td><span class="text-ellipsis">  {{ $item->cam1 }} </span></td>
                                <td><span class="text-ellipsis">  {{ $item->cam2}} </span></td>
                                <td><span class="text-ellipsis">  {{ $item->sim }} </span></td>
                                <td><span class="text-ellipsis">  {{ $item->connect }} </span></td>
                                <td><span class="text-ellipsis">  {{ $item->pin }} </span></td>
                                <td><span class="text-ellipsis">  {{ $item->os }} </span></td>





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
