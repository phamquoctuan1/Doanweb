@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh mục
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
                            <th>Tên danh mục</th>
                            <th>slug</th>
                            <th>Danh mục</th>
                            <th>Ngày thêm</th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_category as $key => $item)


                            <tr>

                                <td><span class="text-ellipsis">{{ $key + 1 }}</span></td>
                                <td><span class="text-ellipsis">
                                    <a href="{{ url('danh-muc-con/' . $item->cate_id) }}">{{ $item->cate_name }}</a>
                                    </span></td>
                                <td><span class="text-ellipsis">{{ $item->cate_slug }}</span></td>
                                <td><span class="text-ellipsis">{{ $item->parent_id }}</span></td>
                                <td><span class="text-ellipsis">{{ $item->created_at }}<span></td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc xóa danh mục này?')"
                                        href="{{ url('delete-category', $item->cate_id) }}">
                                        <i class="icon-fixed-width icon-trash"></i>
                                        <a href="{{ url('edit-category', $item->cate_id) }}">
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
            </footer>
        </div>
    </div>

@endsection
